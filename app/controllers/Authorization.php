<?php
namespace app\controllers;

class Authorization {
    
    private $page = 'Page1';//имя страницы по умолчанию page1
    private $action = 'read'; //CRUD-операции, по умолчанию read
    private $parameters; //массив остальных параметров запроса
    
    
    
    public function __construct($arr)
    {
        $this->parameters = $arr;
        $this->analyzeRequest($this->parameters);
    }
    
    
    protected function analyzeRequest()
    { 
        //var_dump($this->parameters);
        if (!empty($this->parameters[0]))
        { 
            $this->page = $this->parameters[0];
            unset($this->parameters[0]);
        }
        if (!empty($this->parameters[1]))
        {   $method = $this->parameters[1];
            unset($this->parameters[1]);
        }

        
        $this->$method($this->page, $this->action ,$this->parameters);
    }

    public function render($class, $action, $params )
    {
        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action,$params);
        
        //Вид:
        $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
        $view = new $className();
        $view->render($model->getData());
    }
    
    
    public function logIn($class, $action, $params )
    {
        $class = 'logIn';
        
        
        //Модель:
        $className = '\app\models\\'.$class;
        $model = new $className();
        $model->execute($action,$params);
        
        $data = $model->getData();
        
       // var_dump($data);
        
        
        if(is_array($data)){
           
            $_SESSION['idUser'] = $data[0]['id_user'];
            $_SESSION['user'] = $data[0]['user'];
            $_SESSION['login'] = $data[0]['login'];
            
            header('Location: '.'/PhotoLists/'.ucfirst($data[0]['title_status']));
            
        }
        else{
            //Вид:
            $class = 'Authorization';
            $className = '\app\views\\'.$class;//имя класса view с пространством имен (например /views/page1)
            $view = new $className();
            $view->render($model->getData());
        }
  
    }
    
    
    
    public function logOut($class, $action, $params )
    {
        
        if(isset($_SESSION['user'])){
            
            session_destroy();
            header('Location: '.'/PhotoLists/index.php');
            exit();
        }
        
       
    }
    
    
   
}
