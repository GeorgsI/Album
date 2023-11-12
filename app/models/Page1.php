<?php
namespace app\models;
use \PDO;
class Page1 extends Model{
    
   
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        $this->data = 'Данные страницы page1';
        

        
        $works = "SELECT * FROM `album`";
        
        
        
       
        
        
        
   
            $request = $this->connectDB->$action($works);
       
     
        
    
        $this->data = $request;
        
        //var_dump($request );
        
        
    }
    

   

    public function getData()
    {
        return $this->data;
    }
    
}
