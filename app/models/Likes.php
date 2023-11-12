<?php
namespace app\models;

class Likes extends Model{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        $requestData = json_decode($parameters);
        
       
        
        
       // var_dump($requestData );
       
        
        
       /* if(isset($_SESSION['idUser']) && isset( $_SESSION['user']) && isset( $_SESSION['login']) ){
         
            $paramGrad = ['user'=> $_SESSION['idUser'] ];
            $sqlBASE = "SELECT `id_rating`, `id_user`, `id_material`, `grade` FROM `rating` WHERE `id_user` = :user ";
            $requestGrad = $this->connectDB->read($sqlBASE, $paramGrad); 
            
            var_dump($requestGrad);
            
            //$grad; 
            
            if( $requestGrad->id_user== $_SESSION['idUser']  && $requestGrad['id_material'] == (int)$requestData->id  &&   $requestGrad["grade"] == $requestData->countLikes ){
                
               $param =['iduser'=>$_SESSION['idUser'], 'material'=> (int)$requestData->id, 'grad'=>$requestData->countLikes]; 
               $sql = "DELETE FROM `rating` WHERE `id_user` = :iduser and `id_material` = :material and `grade` = 1";
                
                
            }
            else{
              
                
            }*/
            
            
            
            
          /*  $param =['iduser'=>$_SESSION['idUser'], 'material'=> (int)$requestData->id, 'grad'=>$requestData->countLikes];    
            $sql = "INSERT INTO `rating`(`id_user`, `id_material`, `grade`) VALUES ( :iduser, :material, :grad)";
            $request = $this->connectDB->write($sql, $param); */
        
        
            
            
            
       // }
        
        
   
        
        echo json_encode($_SESSION['idUser'] /*$requestData.countLikes*/);
       // $this->data =$requestData;
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       // $this->data =json_encode($requestData);
    }       

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function getData()
    {
        return $this->data;
    }   
}