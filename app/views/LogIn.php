<?php

namespace app\views;

class LogIn implements View{
    public function render($data)
    {
        
       
        $header = new templates\Header();
        $header->render();
        
        
        

        
        echo "<main class = 'main'>";
        
        
        
        $Directions = new templates\LogIn();
        $Directions->render();
       
        
        
        echo "</main>";
        
        $footer = new templates\Footer();
        $footer->render();
        
       
    }
}
