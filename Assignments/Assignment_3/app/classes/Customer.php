<?php

namespace App\Classes;

use App\Classes\User;
use App\Interfaces\Registerable;

class Customer extends User implements Registerable
{
  public function Register()
  {
    printf("Registerable customer methos is proccessing! \n");
    // get register data and register
  }
}
