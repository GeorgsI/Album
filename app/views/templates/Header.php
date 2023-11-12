<?php
namespace app\views\templates;

class Header {
  public function render(){
      //var_dump($data['listMenu']);
      $out='';
        $out.="<!DOCTYPE html>
            <html>
                <head>
                    <meta charset='UTF-8'>
                    <title></title>
                    
                    <link rel='stylesheet' href='/PhotoLists/css/style.css'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='stylesheet' href='/PhotoLists/font-awesome-4.7.0/css/font-awesome.min.css'>
                </head>
                <body >
        <div class='wrepper'>     
    
            <div class='header'>
                <div class='header-blockFirst'>
                    <div class='header__container  header-blockFirst-container'>
                        <span class='header-blockFirst-text'></span>
                        <div class='header-menu'>
                            
                        </div>
                    </div>
                </div>

                <div class='header-blockSecond'>
                    <div class='header__container header-blockSecond-container'>
                        <a href='/PhotoLists/index.php' class='header__logo'>Kovalёv</a>
                        <div class='wrepper-inner-blockSecond'>
                            <a href='index.php' class='header__logo-min'>Kovalёv</a>
                        </div>";
                        

                    if(isset($_SESSION['user'])){
                        $out.="<div class='wrepAutorization'>
                                <a href='/PhotoLists/LogOut' class='btn outBtn__cab'>Выход</a>
                                <div class=wrepAccaunt><i class='fa fa-user-circle-o' aria-hidden='true'></i><p>{$_SESSION['user']}</p></div>  
                            </div>";
                    }    
                    else{
                        $out.="<div class='wrepAutorization'>
                                    <a href='/PhotoLists/Authorization' class='btn'>
                                        <i class='fa fa-sign-in btnIcon' aria-hidden='true'></i> 
                                         <span class='btnIcon_title'>Авторизация</span>
                                        </a>
                                    <a href='/PhotoLists/Registration' class='btn btn-reg'>
                                        <i class='fa fa-user-o btnIcon' aria-hidden='true'></i>
                                        <span class='btnIcon_title'>Регистрация</span>
                                    </a>
                                </div>"; 
                        
                    }
                $out.="</div>
                </div>
               

            </div> ";
        
        
        echo $out;
        
    }
}
