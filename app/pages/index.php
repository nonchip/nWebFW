<?php
namespace App\pages;

class Index extends \n\c\Controller{
    public function doIndex(){
        $header=$this->template('header');
        $header->assign('pageHeading','Hello!');
        $index=$this->template('index');
        $index->assign('header',$header);
        $index->assign('something','Hello World!');
        echo $index->render();
    }
}