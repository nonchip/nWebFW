<?php

namespace n\c;

class Router implements \n\i\Router{
    var $rewrite_rules=array();
    var $url,$parts,$cname,$mname,$class;
    public function rewrite($url){
        foreach($this->rewrite_rules as $k=>$v){
            $url=preg_replace($k,$v,$url);
        }
        return $url;
    }

    public function route($url=false){
        if(!$url) $url=h_request_path();
        $this->url=$this->rewrite($url);
        $this->parts=explode('/',$this->url);
        if(count($this->parts)<1 || empty($this->parts[0]))
            $this->parts[0]='index';
        if(count($this->parts)<2 || empty($this->parts[1]))
            $this->parts[1]='index';
        $this->cname='App\\pages\\'.ucfirst($this->parts[0]);
        $this->mname='do'.ucfirst($this->parts[1]);
        if(file_exists(_APP_PATH.'/pages/'.$this->parts[0].'.php')){
            include_once(_APP_PATH.'/pages/'.$this->parts[0].'.php');
            if(class_exists($this->cname)){
                $this->class=new $this->cname($this->parts);
            }else{
                header('HTTP/1.0 404 Class Not Defined');
                echo "<h1>404 Class Not Defined</h1>";
                echo "The controller you requested ($this->cname) doesn't properly define it's class.";
                exit;
            }
            if(method_exists($this->class,'preDispatch'))
                call_user_func_array(array($this->class,'preDispatch'),$this->parts);
            if(method_exists($this->class,$this->mname)){
                call_user_func_array(array($this->class,$this->mname),$this->parts);
                if(method_exists($this->class,'postDispatch'))
                    call_user_func_array(array($this->class,'postDispatch'),$this->parts);
            }else{
                header('HTTP/1.0 404 Method Not Found');
                echo "<h1>404 Method Not Found</h1>";
                echo "The controller you requested ($this->cname) doesn't have the method you requested ($this->mname).";
                exit;
            }
        }else{
            header('HTTP/1.0 404 Class Not Found');
            echo "<h1>404 Class Not Found</h1>";
            echo "The controller you requested ($this->cname) doesn't exist.";
            exit;
        }
    }
}
