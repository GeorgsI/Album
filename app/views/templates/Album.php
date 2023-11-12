<?php
namespace app\views\templates;

class Album {
    public function render($data){
        
        //var_dump($data);
        $out='';
        $idCat=0;
    
        $out .= "<section class='Album-Block'>
                <div class='Album__container'>
                <div class='block__titleWrepper'>
                    <h1 class='block__title'>Aльбом: {$data[0]['title_album']}</h1>
                </div>    
                <ul class='photoList'>";
        
   
        
        $wrepper = 'photoList__item-close';
        if( isset($_SESSION['idUser']) &&  isset($_SESSION['user']) && isset($_SESSION['login'])){
            
            $wrepper = 'photoList__item';
        }
       
        
        
        
        if(isset($data) &&   $data[0]['id_photo'] != null ){
        
        forEach($data as $key=>$value){
           // $d = json_encode($value );
            //echo $d ;
            
            
            
            
            
            $out .= "<li class='{$wrepper} itemPhoto'  data-number='{$value['id_photo']}'>
                        <div class='itemPhoto__wrepperInfo infoImg'>";
                        
                        
                    if(isset($value['linck_photo'])){
                         $out .= "<img src='{$value['Min_img']}' class='itemPhoto__img'>";
                    }                    
                        $out .= "</div>  
                        <div class='itemPhoto_wrepperInfo infoImg'>
                            <p class='infoImg__title'>{$value['title_photo']}</p>
                                
                            <div class='infoImg__activ activ'>
                                <p class='PhotoW_Block PhotoW__countComments'>
                                    <i class='fa fa-comment-o' aria-hidden='true'></i>
                                    <span class='countActiv countComments-{$value['id_photo']}'>{$value['comments']}<span>
                                </p>
                                <div class='PhotoW_Block PhotoW__mood'>
                                    <div class='likeWrep'>
                                        <div class='PhotoW__like-prev' title='Нравится'><i class='fa fa-thumbs-up' aria-hidden='true'></i></div>
                                        <span class='countActiv countActiv-like-prev-{$value['id_photo']}'>{$value['likes']}<span>
                                    </div>
                                    <div class='likeWrep'>
                                        <div class='PhotoW__disLike-prev' title='Не нравится'><i class='fa fa-thumbs-down' aria-hidden='true'></i></div>
                                        <span class='countActiv countActiv-disLike-prev-{$value['id_photo']}'>{$value['dislike']}<span>
                                    </div>
                                </div>
                            <div>
                        </div> 
                       
                    </li>";
                                        
            $idCat =$value['id_album'];
            
            } 
        }   

       
        $out .="<li class='photoList__item itemPhoto itemPhoto__add'> 
            <a href='/PhotoLists/AddIMGForm/{$data[0]['id_album']}' class='photoList__item-linck'>    
               <span class='itemPhoto__add_text'> <i class='fa fa-plus' aria-hidden='true'></i> Добавить изображение</li></span>
            </a>    
               </ul>";           
        $out .= "<a href='/PhotoLists/index.php' class='btn'>Назад</a></div></section>";
        echo $out;
        
    }
    
}
