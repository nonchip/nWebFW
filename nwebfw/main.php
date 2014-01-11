<?php

if(file_exists(_APP_PATH.'/helpers.php'))
    include(_APP_PATH.'/helpers.php');

include_once(__DIR__.'/helpers.php');

if(file_exists(_APP_PATH.'/helpers.php'))
    include(_APP_PATH.'/helpers.php');

include_once(__DIR__.'/interfaces/router.php');
include_once(__DIR__.'/interfaces/module.php');
include_once(__DIR__.'/interfaces/template.php');

include_once(__DIR__.'/classes/router.php');
include_once(__DIR__.'/classes/controller.php');
include_once(__DIR__.'/classes/template.php');

if(file_exists(_APP_PATH.'/controller.php'))
    include_once(_APP_PATH.'/controller.php');

if(file_exists(_APP_PATH.'/template.php'))
    include_once(_APP_PATH.'/template.php');

$router=false;

if(file_exists(_APP_PATH.'/router.php')){
    include_once(_APP_PATH.'/router.php');
    $router=new \App\Router();
}else{
    $router=new \n\c\Router();
}

$router->route(h_request_path());
