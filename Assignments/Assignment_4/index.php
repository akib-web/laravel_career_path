<?php

require_once "vendor/autoload.php";

use App\Web\Route;

$route = new Route();
$route->get('/', function () {
  return "this is index page of the banking app";
});
