<?php

namespace App\Classes;

use App\Classes\User;

class Admin extends User
{
  public function __construct()
  {
    $this->role = UserType::ADMIN;
    $this->id = time();
  }
}
