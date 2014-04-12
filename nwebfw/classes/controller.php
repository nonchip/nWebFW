<?php
namespace n\c;

class Controller{
    public function widget($name){
        if (file_exists(_APP_PATH . '/widgets/' . $name . '.php')) {
            include_once(_APP_PATH . '/widgets/' . $name . '.php');
            $name = '\\App\\widgets\\' . ucfirst($name);
            if(class_exists($name))
                return new $name();
        }
        return NULL;
    }

    public function template($name){
        return new Template($name);
    }
}
