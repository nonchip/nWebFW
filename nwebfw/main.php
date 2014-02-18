<?php
// app helpers (for override)
if (file_exists(_APP_PATH . '/helpers.php'))
    include(_APP_PATH . '/helpers.php');

// sys helpers
include_once(_SYS_PATH . '/helpers.php');

// app helpers again (for extension)
if (file_exists(_APP_PATH . '/helpers.php'))
    include(_APP_PATH . '/helpers.php');

// sys interfaces
include_once(_SYS_PATH . '/interfaces/router.php');
include_once(_SYS_PATH . '/interfaces/widget.php');
include_once(_SYS_PATH . '/interfaces/template.php');

// sys classes
include_once(_SYS_PATH . '/classes/router.php');
include_once(_SYS_PATH . '/classes/controller.php');
include_once(_SYS_PATH . '/classes/template.php');

// app classes w/o router
if (file_exists(_APP_PATH . '/controller.php'))
    include_once(_APP_PATH . '/controller.php');

if (file_exists(_APP_PATH . '/template.php'))
    include_once(_APP_PATH . '/template.php');

// finding router
$router = false;
if (file_exists(_APP_PATH . '/router.php')) {
    include_once(_APP_PATH . '/router.php');
    $router = new \App\Router();
} else {
    $router = new \n\c\Router();
}

// dispatching router
$router->route();
