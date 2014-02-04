<?php

namespace n\i;

interface Template extends Widget
{
    public function __construct($file);

    public function assign($name,$value);
}