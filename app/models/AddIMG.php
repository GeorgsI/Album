<?php
namespace app\models;
use core\Verification;

class AddIMG extends Model{
    
   
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
       
        
        //$category;
        
// var_dump($_POST['category']);
      
        if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_FILES) /*&& $_FILES["filename"]["error"]== UPLOAD_ERR_OK*/ )
        {
           
            $description =  Verification::out($_POST["description"]); 
            $titleImg =  Verification::out($_POST["title"]);
            $category = Verification::out($_POST["category"]);

            $img = $_FILES; 
            $fileName = Verification::out($img["Img"]['name']);
            $img["Img"]['name'] = $fileName;
            
          /* if($img['Img']['size'] > (5 * 1024 * 1024)){
                $this->data = ['error'=>'<p>Размер изображения не должен превышать 5Мб.</p>', 'catNumAns'=>$_POST["category"]];
           } */
           

           
           $filenameTime = $img["Img"]["tmp_name"];//имя временного файла, под которым он был сохранен на сервере.  
           $formar_arr = [ 1=>'.jpg', 2=>'.png', 3=>'.jpeg'];
           $formatCurrent_file = stristr($fileName,'.' );
           

           $arguments = ['category'=>$_POST["category"] ];
           $sqi_category = "SELECT `title_album` FROM `album` WHERE `id_album` = :category";
           $request_CategoryFiles = $this->connectDB->read($sqi_category, $arguments);
           
           
           $upload_file =  $request_CategoryFiles[0]["title_album"];
        
           
           if(!array_search($formatCurrent_file, $formar_arr )){
               $this->data = ['error'=>'<p>Возможна заргрузка изображений формата JPG или PNG.</p>', 'catNumAns'=>$_POST["category"]];
               // echo 1111;
                
              
           }
           else {
              
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
                //Основное изображение.
               
                $filename = $img["Img"]["tmp_name"];//имя временного файла, под которым он был сохранен на сервере. 
                $uniquePref = uniqid();
                $destination = $uniquePref.$img["Img"]["name"] ;

              
                
                
                
                
                
                
                
                
                
                
                
                
                
                if(is_dir('Photo/'.$upload_file)){
                    if(move_uploaded_file($filename, 'Photo/'.$upload_file.'/'.$destination)){
                        
                $linckPhoto = "\\PhotoLists\\Photo\\".$upload_file."\\".$destination;
                
                
                $linckPhoto1 = "Photo/".$upload_file."/".$destination;  
                $linckPhoto2 = "Photo/".$upload_file."/Min".$destination;  
                
                
                $linckPhoto22 = "\\PhotoLists\\Photo\\".$upload_file."\\Min".$destination;  
               //Миниатюры изображение.
               
               
                $nw = 300;    // Ширина миниатюр
                $nh = 250;
               
                $source = $linckPhoto1;// Исходный файл
                $dest = $linckPhoto2;  
              
                
                $size = getimagesize($linckPhoto1);    
                $w = $size[0];    
                $h = $size[1];
                
                
                
                
                
                $stype = explode(".", $linckPhoto1);
                $stype = $stype[count($stype)-1];
                $simg;
                switch($stype) {
                    case 'gif':
                        $simg = imagecreatefromgif($source);
                        break;

                    case 'jpg':
                        $simg = imagecreatefromjpeg($source);
                        break;
                
                    case 'jpeg':
                        $simg = imagecreatefromjpeg($source);
                        break;
                
                    case 'png':
                        $simg = imagecreatefrompng($source);
                        break;

                }
       
                        
                $dimg = imagecreatetruecolor($nw, $nh);

                $wm = $w/$nw;

                $hm = $h/$nh;

                $h_height = $nh/2;

                $w_height = $nw/2;
  

                if($w > $h) {

                    $adjusted_width = $w / $hm;
                    $half_width = $adjusted_width / 2;
                    $int_width = $half_width - $w_height;
                    imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);

                } elseif(($w < $h) || ($w == $h)) {    

                        $adjusted_height = $h / $wm;
                        $half_height = $adjusted_height / 2;
                        $int_height = $half_height - $h_height;
                        imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);

                     } else {    

                        imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);

                     }    

                imagejpeg($dimg,$dest,100);
    
                
                
                
                
                
                
                        
                    
               
                    $arguments_newPhoto = ['titleImg'=>$titleImg, 'linck'=>$linckPhoto, 'album'=>(int)$_POST["category"], 'likes'=>0, 'dislike'=>0, 'viwe'=>0, 'comments'=>0,'description'=>$description, 'Min_img'=>$linckPhoto22];
                    $sqi_newPhoto = "INSERT INTO `photo`(`title_photo`, `linck_photo`, `albumID`, `likes`, `dislike`, `viwe`, `comments`, `description`, `Min_img` ) VALUES (:titleImg, :linck, :album, :likes, :dislike, :viwe, :comments ,:description, :Min_img)";
                    $request = $this->connectDB->write($sqi_newPhoto, $arguments_newPhoto);

                    header('Location: '.'/PhotoLists/Album/'.$_POST["category"]);
                      
                        
                    }
                }   
           }      
                   
      
            
            
            
        } else {
        
     
        $this->data = ['error'=>'<p>Ошибка. Заполниете поля.</p>', 'catNumAns'=>$_POST["category"]];
        }
       
       
       
     
        
    
       // $this->data = $request;
        
        //var_dump($request );
        
        
    }
    

   

    public function getData()
    {
        return $this->data;
    }
    
}
