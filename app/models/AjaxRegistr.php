<?php
namespace app\models;

class AjaxRegistr extends Model{
    
   
    
    function execute($action, $parameters)
    {
       // header("Content-type: application/json; charset=utf-8");
        parent::execute($action, $parameters);
       // $this->data = 'Данные страницы page1';
        
       /* $requestJSON = file_get_contents('php://input');
        $requestData = json_decode($requestJSON);*/
         
       
     //   var_dump($_POST);
        
        
        if (empty($requestData->name) && empty($requestData->login) && empty($requestData->password)){

        include_once './Core/ConnectDB.php';



         if(mb_strlen($_POST['name'])>15 ){
             echo 'Ошибка.';
             echo 'Длинное имя.';
         }
         elseif(!preg_match("/^[A-Я]{1}[а-яё]{1,14}|[а-яё]{2,15}|[A-Z]{1}[a-z]{1,14}|[a-z]{2,15}$/", $_POST['name'])){
             echo 'Ошибка.';
             echo 'В поле имя.';
         }
         elseif(mb_strlen($_POST['password']) > 10){
            echo 'Ошибка.';
             echo'Длинный пароль.';
         }
         elseif(mb_strlen($_POST['password']) < 8){
             echo 'Ошибка.';
             echo 'Короткий пароль не меншье 8.';
         }
         elseif(!preg_match("/^[A-Za-z0-9\_\*\.]{8,10}$/", $_POST['password'])){
             echo 'Ошибка.';
            echo 'В поле пароль не допустимый символ.';
         }
         elseif(mb_strlen($_POST['login']) > 10){
             echo 'Ошибка.';
             echo 'Длинный логин';
         }
         elseif(mb_strlen($_POST['login']) < 3){
             echo'Ошибка.';
             echo'Короткий логин не меншье 3';
         }
         elseif(!preg_match("/^[A-Za-z0-9]{3,10}$/", $_POST['login'])){
             echo 'Ошибка.';
            echo 'В поле логин не допустимый символ.';
         }
         else{





             //$db = new ConnectDB('localhost', 'root', 'root' ,'store', 'utf8');
             $sql_login = "SELECT COUNT(*) FROM users WHERE login = :login";
             //$sql_email = "SELECT COUNT(*) FROM users WHERE email= :email";




             $check_login = $this->connectDB->countRows($sql_login, ['login'=> $_POST['login']]);
           //  $check_email = $this->connectDB->countRows($sql_email, ['email'=> $_POST['email']]);  

             echo  $check_login;

             if((int)$check_login > 0 ){
                 echo '<p>Логин уже занят</p>';
             }
             /*elseif((int)$check_email > 0 ){
                echo  '<p>Почта уже занята</p>';
             }*/
             else{


                $sql = "INSERT INTO `users`( `user`, `login`, `password`) VALUES (:Name,  :login, :password )";

                $passwordH = password_hash($_POST['password'], PASSWORD_DEFAULT);      
                $arguments = ['Name'=>$_POST['name'],'login'=>$_POST['login'],'password'=>$passwordH];   



                $this->connectDB->write($sql, $arguments);

                echo '<p>Вы зарегистрированы</p>';
             }

         }

     }else{
        echo '<p>Заполните все поля</p>';
     }

        
        
    }       

    public function getData()
    {
        echo $this->data;
    } 
  
}
