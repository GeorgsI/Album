<?php
namespace app\views\templates;

class AddIMGForm {
    public function render($data){
        //var_dump($data);
        //hidden
        $out=" <div id='window'><section class='form-Block'>
            



            <form  method='POST'  enctype='multipart/form-data' class='form formaddAlbum' id='formaddIMG' action='AddIMG' >
                <div id='auth'></div>";
                
                if(isset($data['error']) ){
                    $out.=" <div id='autherror'>".$data['error']."</div>";
                }
                   $out.= "<div class='form-innerWrepper'>
                        <div class='form-elementWrepper'>
                            <h2 class='form-title'>Добавить изображение</h2>
                        </div>";
                    
                    if( isset($data['catNum'][2])){
                        $out.= "<input type='hidden' value='".(int)$data['catNum'][2]."'  name='category'  id='category'>";
                    }   
                    if( isset($data['catNumAns'])){
                       $out.= "<input type='hidden' value='".(int)$data['catNumAns']."'  name='category'  id='category'>";
                    }  
                    $out.= "<div class='form-elementWrepper'>
                            <input class='field field-ImgTitle' type='text' placeholder='Название' name='title'  id='title'>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='field fieldaddImg' placeholder='Описание' name='description' id='description' type='text'>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='field fieldaddImg' placeholder='Изображение' name='Img' id='Img' type='file'>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='btn form-btn  addImg-btn' type='submit' value='Добавить фото' title='Добавить'>
                        </div>
                        <div class='form-elementWrepper'>
                           <a href='/PhotoLists/index.php' class='btn addAlbum-btn'>Назад</a>
                        </div>
 
                    </div>
                </form>
            </section></div>";
                    
        echo $out;       
        
    }
}
