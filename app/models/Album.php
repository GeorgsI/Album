<?php
namespace app\models;

class Album extends Model{
    
   
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
 
        $arguments = ['num'=> (int)$parameters[2]];     
       
        $sql_AlbumSelect = "SELECT * FROM `album`
                            LEFT JOIN `photo`
                            ON `album`.`id_album` = `photo`.`albumID`
                            WHERE `album`.`id_album` = :num";   
       
       
   
        $request = $this->connectDB->$action($sql_AlbumSelect, $arguments);
       
     
        
    
        $this->data = $request;
        
    
        
        
    }
    

   

    public function getData()
    {
        return $this->data;
    }
    
}

