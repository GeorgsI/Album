<?php
namespace router;

class Router implements IRouter{
    private $routes;
    private $url;
    
    public function __construct($url, $routes) {
        $this->routes = $routes;
        $this->url = $url;

    }
    public function getRoute(){
        
        //var_dump($this->routes);
      // var_dump($this->url);
     
        
      //  $rootArr = '';
        
        
       //Выбор массива
        
        $realroot='';
        
        
        
        foreach($this->routes as $reg => $value) {

            if(preg_match($reg, $this->url)){

                if(substr_count($this->url, '/') > 0 ){
                   $res = explode('/', $this->url);//создаём массив
                   $varUrl = array_slice($res, 1);//обрезаем из url название сщнтроллера и оставляем № товара из бд.
                 //  var_dump( $value);
                   $value2 =  array_slice($value, 0, 2);// из массива с путями выризаем № 
                   $value = array_merge($value2,  $varUrl);
                  // var_dump( $value2);
                   
                   if(substr_count($this->url, '/') == 2){
                        $res = explode('/', $this->url);
                        $varUrl = array_slice($res, 2);
                        $value2 =  array_slice($value, 0, 3);
                        $value = array_merge($value2,  $varUrl);
                       // var_dump( $value); 
                       
                   } 
                   
                   
                } 
                $realroot = $value;
                //return $value;
            }
            
           
          // echo 3; 
       //  exit();
   
       }
       
       if($realroot != ''){
            return $realroot;
       }
       else{
          // echo 3; 
           
           $realroot =["fourHundredFour", "render"];
           return  $realroot;
       }
       
       
    }  
}
