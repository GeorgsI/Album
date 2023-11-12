<?php session_start();

//var_dump( /*$_SESSION*/);
include_once('router/routes.php');
//include_once('router/routes.php');

        spl_autoload_register(function($class){
            $class =  str_replace('\\', '/', strtolower($class)).'.php';
                    
           
          //  echo "spl ".$class;
            if (file_exists($class))
                return include_once($class);
                //echo 1;
            else
               //echo 2;
                return false;
            
            
        });
  
     
    $url = $_SERVER['REQUEST_URI'];
    $baseURL = dirname($_SERVER['SCRIPT_NAME']);
    if(strpos($url, $baseURL) === 0){
        $url = substr($url, strlen($baseURL));
    }
  
    $url = trim($url, '/');
  
 
 
    
    $r = new router\Router($url, $return);
    $x = $r->getRoute(); 
    //var_dump($x);
    $class = 'app\controllers\\'.$x[0]; 
    $controller = new $class($x);
    