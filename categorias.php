<?php

require_once("config.php");
require_once(__DIR__ . "/vendor/autoload.php");

use Controller\CategoriaController;

$controller = new CategoriaController();
$controller->selectAll();