<?php

namespace App\Classes;

use App\Classes\User;
use App\Classes\Storage;
use App\Classes\Registration;

class Customer extends User
{

  protected int $bankAcc;

  public function __construct()
  {
    $this->role = UserType::CUSTOMER;
    $this->id = time();
    $this->bankAcc = rand();
  }
  public function getBankAcc()
  {
    return $this->bankAcc;
  }
}
