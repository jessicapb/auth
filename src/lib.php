<?php
$routes =[
    'home',
    'login',
    'auth',
    'dashboard',
    'error'
];

function dd(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
    die;
}

function router(array $routes,string $default_route=null):string 
{
    $url=parse_url($_SERVER['REQUEST_URI'])['path'];
    $path=explode('/',$url);
    $uri=array_filter($path,function($item){
        return $item!=='';
    });
    $uri=array_values($uri);
    if(empty($uri[0])){
        $uri[0]=$default_route??'home';
    }
    if(in_array($uri[0],$routes,true)){
        return $uri[0];
    }
    set_error("Ruta no encontrada");
}

function set_error(string $message){
    $_SESSION['error']=$message;
    http_redirect('error',404);
}

function http_redirect(string $location, int $status_code){
    header('Location:'.$location,true,$status_code);
}


function view(string $view,array $data=null){
    if(is_array($data)){
        extract($data,EXTR_OVERWRITE);
    }
    ob_start();
    require VIEWS.$view.'.view.php';
    $rendered=ob_get_clean();
    return $rendered;
}