<?php
//print_r($_GET);
//echo '<br>';
//print_r($_SERVER['REQUEST_URI']);

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
//ini_set('display_errors', 1);
mb_internal_encoding('UTF-8');

//require_once 'classes/class.db.php';
error_reporting(0);
require_once 'classes/class.db_local.php';
require_once 'classes/class.data.php';

function autoloadFunction($class)
{
    if (preg_match('/Controller$/', $class)) {
        require 'controllers/' . $class . '.php';
    } else {
        require 'classes/' . $class . '.php';
    }
}

spl_autoload_register('autoloadFunction');

$router = new RouterController();
//$router->handle(array($_SERVER['REQUEST_URI']));
$router->handle($_GET);
$router->showView();
