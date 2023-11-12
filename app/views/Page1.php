<?php
namespace app\views;


class Page1 implements View{
    public function render($data)
    {
        
       
        $header = new templates\Header();
        $header->render($data);
        
        
        

        
        echo "<main class = 'main'>";
        
        
        
        $Directions = new templates\listAlbum();
        $Directions->render($data);
       
        
        
        echo "</main>";
        
        $footer = new templates\Footer();
        $footer->render();
        
       
    }
}
