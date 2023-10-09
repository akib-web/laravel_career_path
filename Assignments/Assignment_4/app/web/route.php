<?php

namespace App\Web;

class Route
{
  public function get(string $route, callable $controller)
  {
    echo "route: " . $route;
    echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>";
    return $controller();
  }

  public function post()
  {
  }

  public function proccess()
  {
  }
}
