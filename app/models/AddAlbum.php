<?php
namespace app\models;
use core\Verification;
class AddAlbum extends Model{
    
   
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
       
        

        
 
      
        if (!empty($_POST["titleAlbum"]) && !empty($_POST["description"]) )
        {
            
            $titleALBUM =  Verification::out($_POST["titleAlbum"]);
            $description = Verification::out($_POST["description"]);
            
            $PathFolder = "Photo/$titleALBUM";
            
            
            
            if (!is_dir($PathFolder)){
                
                
                
                
                $arguments = ['title'=>$titleALBUM, 'description'=>$description ];
                $add_albom = "INSERT INTO `album`(`title_album`, `description_album`) VALUES (:title ,:description)";
                $request = $this->connectDB->write($add_albom, $arguments);

                $this->data = $request;
                
                
                mkdir($PathFolder,  0777, true);
                
                header('Location: '.'/PhotoLists/index.php');
                
            }
            else{
                $this->data = '<p>Ошибка. Данный раздел уже существует.</p>';
            }
            
            
            
            
            
           
            
            
            
            
            
            
            
            
        } else {
            $this->data = '<p>Ошибка. Заполниете поля.</p>';
        }
       
       
       
     
        
    
       // $this->data = $request;
        
        //var_dump($request );
        
        
    }
    

   

    public function getData()
    {
        return $this->data;
    }
    
}
