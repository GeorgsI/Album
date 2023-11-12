<?php
namespace app\views;

class AddAlbumForm {
    public function render($data)
    {
        
        /*echo $data . '<br/>';
        echo '<a href="index.php?page=page2">page 2</a> <a href="index.php?page=page3">page 3</a>';*/
        
       
        //var_dump($data);
        $header = new templates\Header();
        $header->render($data);
        
        
        

        
        echo "<main class = 'main'>";
        
        
        
        $Directions = new templates\addAlbumForm();
        $Directions->render($data);
       
        
        
        echo "</main>";
        
        $footer = new templates\Footer();
        $footer->render();
        
       
    }
}
