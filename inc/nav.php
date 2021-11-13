<?php
require_once 'classes/class.db_local.php';
require_once 'classes/class.data.php';

$db = new db_connect();
$data = new data;
$nav = $data->showMenuItems();
