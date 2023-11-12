<?php
namespace app\views\templates;

class listAlbum {
    public function render($data){
        
        $out='';
    
    
        $out .= "<section class='pageHeader-Block'>
                <div class='page__container'>
                <div class='block__titleWrepper'>
                    <h1 class='block__title'>Список альбомов</h1>
                </div>  
                
                
                <ul class='albumList'>";
        forEach($data as $key=>$value){
            
            $out .= "<li class='albumList__item itemAlbum'>
                        <a href='/PhotoLists/Album/{$value['id_album']}' class='itemAlbum__linck'><span class='itemAlbum__title'>{$value['title_album']}</span></a>     
                    </li>";
             
        }   

        
        $out .="<li class='albumList__item itemAlbum'>
                    <a href='/PhotoLists/CreateAlbumForm' class='itemAlbum__linck'><i class='fa fa-plus' aria-hidden='true'></i> Добавить раздел</a>  
                </li></ul>"; 
                
       
        $out .= "</div></section>";
        echo $out;
        
    }
    
    
    
}
