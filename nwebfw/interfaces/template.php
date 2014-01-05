<?php

namespace n\i;

interface Template extends Module{
    public function __construct($file);

    public function assign($name,$value);
}