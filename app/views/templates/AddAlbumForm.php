<?php
namespace app\views\templates;

class AddAlbumForm {
    public function render($data){
        $out=" <div id='window'><section class='form-Block'>
            

                <form  method='POST' class='form formaddAlbum' id='formaddAlbum' action='AddAlbum'>
                <div id='auth'></div>";
                if($data){
                    $out.=" <div id='autherror'>$data</div>";
                }
                   $out.= "<div class='form-innerWrepper'>
                        <div class='form-elementWrepper'>
                            <h2 class='form-title'>Добавить альбом</h2>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='field field-addAlbumTitle' type='text' placeholder='Название альбома' name='titleAlbum'  id='titleAlbum'>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='field fieldaddAlbum' placeholder='Описание' name='description' id='description' type='text'>
                        </div>

                        <div class='form-elementWrepper'>
                            <input class='btn form-btn  addAlbum-btn' type='submit' value='Создать альбом' title='Создать альбом'>
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
