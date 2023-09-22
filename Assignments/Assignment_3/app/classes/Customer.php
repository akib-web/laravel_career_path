<?php

use App\Classes\User;
use App\Interfaces\Registerable;

class Customer extends User implements Registerable
{
  public function Register($data)
  {
    // get register data and register
  }
}
