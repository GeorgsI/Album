<?php
namespace app\views\templates;

class Authorization {
     public function render($data){
        $out=" <div id='window'><section class='form-Block'>
            

                <form  method='POST' class='form formAuthorization' id='formAuthorizationUser' action='LogIn'>
                <div id='auth'></div>";
                if($data){
                    $out.=" <div id='autherror'>$data</div>";
                }
                   $out.= "<div class='form-innerWrepper'>
                        <div class='form-elementWrepper'>
                            <h2 class='form-title'>Вход</h2>
                        </div>
                        <div class='form-elementWrepper wrepperFB'>
                            <input class='field field-password' type='password' placeholder='Пароль' name='password'  id='password'>
                            <button type='button' class='field_showBtn btn'>
                                <i class='fa fa-eye toggleEye' aria-hidden='true'></i>
                            </button>
                        </div>
                        <div class='form-elementWrepper'>
                            <input class='field fieldAuthorization ' placeholder='Логин' name='login' id='login' type='text'>
                        </div>

                        <div class='form-elementWrepper'>
                            <input class='btn form-btn fieldAuthorization Authorization-btn' type='submit' value='Войти' title='Войти'>
                        </div>
                        <div class='form-elementWrepper'>
                           <a href='/PhotoLists/index.php' class='btn Authorization-btn'>Назад</a>
                        </div>
 
                    </div>
                </form>
            </section></div> 
            <script src='/PhotoLists/javaScript/form.js'></script>";
                    
        echo $out;       
        
    }
    
}
