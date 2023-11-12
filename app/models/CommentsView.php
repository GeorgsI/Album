<?php
namespace app\models;

class CommentsView extends Model{
    
  
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
       
        $requestData = json_decode($parameters);
        
        
        
     
    
        
        
        
        
        
        
        $sql_listComments ="SELECT `id_comments`, `users`.`id_user`, `comments`.`id_user` , `id_material`, `comment`, `user`  FROM  `comments`
                    INNER JOIN users
                    ON users.id_user =  comments.id_user
                    WHERE `id_material` = :id";
        
        
        
        
        
        $user = $_SESSION['idUser'];
       // $idMaterial = (int)$requestData->id;
        $idPhoto = (int)$requestData->id;
        
        
        
        
        
        
        
        
        
        
         if(isset($requestData->target) && $requestData->target == 'InfoCommentAdd'){
            //Считаем комментарии.
            $argumentsViuw = ['id'=>$idPhoto ];
            $sql_countComments = "SELECT COUNT(`id_comments`)as allComments FROM `comments` WHERE `id_material` = :id";
            $result = $this->connectDB->read($sql_countComments, $argumentsViuw);
            $result[0]['idPhoto'] = $idPhoto;
            echo json_encode( $result);
            
        }
        
        
        
        
        
        
        
        
        
        
        if(isset($requestData->target) && $requestData->target == 'openPhotoPage'){
            
            //Считаем и записываем просмотры.
            $argumentsViuw = ['id'=>$idPhoto ];
            $sql_addViuw = "UPDATE `photo` SET `viwe`= `viwe`+1 WHERE `id_photo`= :id";
            $this->connectDB->write($sql_addViuw, $argumentsViuw);
          
            
            
            
            
            
           
            
            
            
            
            
            
           $arguments = ['num'=> $idPhoto];     
           $sql_selectIMG = "SELECT `id_photo`, `title_photo`, `linck_photo`, `albumID`, `likes`, `dislike`, `viwe`, `comments`, `description`, `Min_img` FROM `photo` WHERE `id_photo` = :num";  
            
            
           $result = $this->connectDB->read($sql_selectIMG,  $arguments);
            
            
           echo json_encode( $result);
            
            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        if(/*isset($requestData->comment)  && isset($_SESSION['idUser'])*/   isset($requestData->target) && $requestData->target == 'addComment'){
            
            
            
            
            $sql_listCommentUpdate ="SELECT `id_comments`, `users`.`id_user`, `comments`.`id_user` , `id_material`, `comment`, `user`  FROM  `comments`
                    INNER JOIN users
                    ON users.id_user =  comments.id_user
                    WHERE `id_material` = :idMaterial AND `comments`.`id_user` = :user ";
            
            $argumentsOldComment = ['user'=>$user, 'idMaterial'=> $idPhoto ];
            $result = $this->connectDB->read($sql_listCommentUpdate, $argumentsOldComment);
            
          
            $comment = $requestData->comment;
            
            if($result){
            
                
                
                $argumentsUpdate = ['idMaterial'=> $idPhoto , 'user'=>$user, 'comment'=>$comment];
                $sql_udate = "UPDATE `comments` SET `comment`=:comment WHERE `id_user`=:user AND `id_material`=:idMaterial";
                $result = $this->connectDB->write($sql_udate,  $argumentsUpdate);
                
                
               
                $argumentsListComments = ['id'=>$idPhoto ];
                $result = $this->connectDB->read($sql_listComments, $argumentsListComments);
                echo json_encode($result);
            
                
                
                
                
                
            }
            else{
                $arguments = ['idMaterial'=> $idPhoto , 'user'=>$user, 'comment'=>$comment];
                $sql_commentAdd = "INSERT INTO `comments`(`id_user`, `id_material`, `comment`) VALUES (:user,:idMaterial,:comment)";
                $this->connectDB->write($sql_commentAdd, $arguments);
                
                
                
                $argumentsViuw = ['id'=>$idPhoto];
                $sql_addViuw = "UPDATE `photo` SET `comments`= `comments` +1 WHERE `id_photo`= :id";
                $this->connectDB->write($sql_addViuw,  $argumentsViuw);
                
                
                
                
                
                
                
                
                $argumentsListComments = ['id'=>$idPhoto];
                $result = $this->connectDB->read($sql_listComments, $argumentsListComments);
                echo json_encode($result);
                
            }
            
           
  
        }
        
        
        
        
        
        
        if(/*!isset($requestData->comment) && $requestData->id*/ isset($requestData->target) && $requestData->target == 'readComments'){
            
          /*  $argumentsViuw = ['id'=>$idMaterial];
            $sql_addViuw = "UPDATE `photo` SET `viwe`= `viwe`+1 WHERE `id_photo`= :id";
            $this->connectDB->write($sql_addViuw,   $argumentsViuw);*/
            
            
            
            
            
            
           $arguments = ['id'=>$idPhoto];
           $result = $this->connectDB->read($sql_listComments, $arguments);
            
            echo json_encode($result);
            
            
            
            
            
        }
        
    
        
      
        
   
        
        
        if(isset($requestData->target) && $requestData->target == 'getOldComment'){
            
            
            $sql_listComments ="SELECT `id_comments`, `users`.`id_user`, `comments`.`id_user` , `id_material`, `comment`, `user`  FROM  `comments`
                    INNER JOIN users
                    ON users.id_user =  comments.id_user
                    WHERE `id_material` = :idMaterial AND `comments`.`id_user` = :user ";
            
            $argumentsOldComment = ['user'=>$user, 'idMaterial'=> $idPhoto];
            $result = $this->connectDB->read($sql_listComments, $argumentsOldComment);
            
            if($result){
                
               echo json_encode($result);
                
            }
            else{
               echo json_encode(''); 
            }
            
            
            
        }
        
        
        
        if(/*!isset($requestData->comment) && $requestData->id*/ isset($requestData->target) && $requestData->target == 'Count'){
            
            $argumentsViuw = ['id'=>$idPhoto];
            $sql_addViuw = "UPDATE `photo` SET `viwe`= `viwe`+1 WHERE `id_photo`= :id";
            $this->connectDB->write($sql_addViuw,   $argumentsViuw);
            
            
            
             
           $sql_read = "SELECT * FROM `photo` WHERE `id_photo`=:id";
           $result = $this->connectDB->read($sql_read,   $argumentsViuw);
            
            
            
            
        echo json_encode($result);
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        if(isset($requestData->target) && $requestData->target == 'like'){
            
            
            $argumentsLikes =['idUser'=>$user, 'idIMG'=> $idPhoto];
            
            $sql_gradeSearch = "SELECT `id_rating`, `id_user`, `id_material`, `grade` FROM `rating` WHERE `id_user` = :idUser AND `id_material` = :idIMG";
            $result = $this->connectDB->read($sql_gradeSearch ,  $argumentsLikes);
            
            
             $argumentsLikes2 =['idIMG'=> $idPhoto];
            
             
              
             
             
            if($result){
                
                $sql_delitLikes = "DELETE FROM `rating` WHERE `id_user` = :idUser AND `id_material` = :idIMG";
                $this->connectDB->delit( $sql_delitLikes,  $argumentsLikes);  
                
                
                if((int)$result[0]["grade"] == 1){
                    
                
                    $sql_UpdateLikes = "UPDATE `photo` SET `likes`= `likes` - 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                    
                    
                    
                }  
                else if((int)$result[0]["grade"] == 0 ){
                    
                    $sql_addLikes = "INSERT INTO `rating`(`id_user`, `id_material`, `grade`) VALUES (:idUser, :idIMG, 1 )";
                    $this->connectDB->write($sql_addLikes,  $argumentsLikes); 
                    
                    $sql_UpdateLikes = "UPDATE `photo` SET `dislike`= `dislike` - 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                    
                    
                    $sql_UpdateLikes = "UPDATE `photo` SET `likes`= `likes` + 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                }
                
                
               // var_dump($result);
                
                
         
                
            }
            else{
                
              
                $sql_addLikes = "INSERT INTO `rating`(`id_user`, `id_material`, `grade`) VALUES (:idUser, :idIMG, 1 )";
                $this->connectDB->write($sql_addLikes,  $argumentsLikes);  
                
                $sql_UpdateLikes = "UPDATE `photo` SET `likes`= `likes` + 1  WHERE `id_photo` = :idIMG";
                $this->connectDB->write($sql_UpdateLikes,  $argumentsLikes2);  
                
                
                
                
            }
            
            $sql_result = "SELECT * FROM `photo` WHERE `id_photo` = :idIMG";
            $result = $this->connectDB->read( $sql_result ,  $argumentsLikes2);
            echo json_encode($result);
            
        }
        
        
        
        //'disLike'
        
        
        
        
        
        if(isset($requestData->target) && $requestData->target == 'disLike'){
            
            
            $argumentsLikes =['idUser'=>$user, 'idIMG'=> $idPhoto];
            
            $sql_gradeSearch = "SELECT `id_rating`, `id_user`, `id_material`, `grade` FROM `rating` WHERE `id_user` = :idUser AND `id_material` = :idIMG";
            $result = $this->connectDB->read($sql_gradeSearch ,  $argumentsLikes);
            
            
            $argumentsLikes2 =['idIMG'=> $idPhoto];
            
             
             
             
             
            if($result){
                
                
                $sql_delitLikes = "DELETE FROM `rating` WHERE `id_user` = :idUser AND `id_material` = :idIMG";
                $this->connectDB->delit( $sql_delitLikes,  $argumentsLikes);   
                
                
                
                if((int)$result[0]["grade"] == 0){
                    
                
                    $sql_UpdateLikes = "UPDATE `photo` SET `dislike`= `dislike` - 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                    
                    
                    
                }  
                else if((int)$result[0]["grade"] == 1 ){
                    
                    
                    $sql_addLikes = "INSERT INTO `rating`(`id_user`, `id_material`, `grade`) VALUES (:idUser, :idIMG, 0 )";
                    $this->connectDB->write($sql_addLikes,  $argumentsLikes); 
                    
                    
                    $sql_UpdateLikes = "UPDATE `photo` SET `likes`= `likes` - 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                    
                    
                    $sql_UpdateLikes = "UPDATE `photo` SET `dislike`= `dislike` + 1  WHERE `id_photo` = :idIMG";
                    $this->connectDB->write($sql_UpdateLikes, $argumentsLikes2); 
                }
                
                
               // var_dump($result);
                
                
         
                
            }
            else{
                
              
                $sql_addLikes = "INSERT INTO `rating`(`id_user`, `id_material`, `grade`) VALUES (:idUser, :idIMG, 0 )";
                $this->connectDB->write($sql_addLikes,  $argumentsLikes);  
                
                $sql_UpdateLikes = "UPDATE `photo` SET `dislike`= `dislike` + 1  WHERE `id_photo` = :idIMG";
                $this->connectDB->write($sql_UpdateLikes,  $argumentsLikes2);  
                
                
                
                
            }
            
            $sql_result = "SELECT * FROM `photo` WHERE `id_photo` = :idIMG";
            $result = $this->connectDB->read( $sql_result ,  $argumentsLikes2);
            echo json_encode($result);
            
        }
        
        
        
        
        
        
        
        
        
        
      
       
        
        
        
        
     // echo json_encode($result);
    
        
        
    }
    

   

    public function getData()
    {
        return $this->data;
    }
    
}
