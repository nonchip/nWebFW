<?php
namespace n\c;

class Controller{
    public function module($name){
        if(file_exists(_APP_PATH.'/modules/'.$name.'.php')){
            include_once(_APP_PATH.'/modules/'.$name.'.php');
            $name='\\App\\modules\\'.ucfirst($name);
            if(class_exists($name))
                return new $name();
        }
        return NULL;
    }

    public function template($name){
        return new Template($name);
    }
}
