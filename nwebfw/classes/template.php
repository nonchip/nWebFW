<?php

namespace n\c;

class Template implements \n\i\Template{
    public function __construct($file){
        $this->assigns=array();
        $this->file=$file;
    }

    public function assign($name,$value){
        $this->assigns[$name]=$value;
    }

    public function render(){
        if(file_exists(_APP_PATH.'/templates/'.$this->file.'.php')){
            $export=array();
            foreach($this->assigns as $k=>$v){
                if ($v instanceof \n\i\Widget) {
                    $export[$k]=$v->render();
                }else{
                    $export[$k]=$v;
                }
            }
            extract($export);
            ob_start();
            include(_APP_PATH.'/templates/'.$this->file.'.php');
            return ob_get_clean();
        }
        return NULL;
    }
}