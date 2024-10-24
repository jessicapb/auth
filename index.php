<?php
define('CONTR',__DIR__.'/src/controllers/');
define('VIEWS',__DIR__.'/src/views/');

require 'src/lib.php';
require 'src/env.php';

//loadEnv('.env');
try{
    $pdo=new PDO('sqlite:'.__DIR__.'/src/db/auth.sqlite');
}catch(PDOException $e){
    die($e->getMessage());
}

$controller=router($routes,'login');
require CONTR.$controller . '.php';
//auntenticació local | password_hash | password