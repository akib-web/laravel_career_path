<?php

namespace App\Classes;

use App\Classes\User;
use App\Interfaces\Registerable;

/**
 * create a class that will manage BankingManager proccess
 *  1. bank has to perform user account creation, show user'r transaction, trasaction proccess
 *  2. 
 */

class BankingManager
{
  private User $user;

  public function __construct()
  {
    $this->user = new user();
  }
  public function loginUser()
  {
    printf('login method called');
    $this->user->login();
  }
  public function createUserAccount(Registerable $customer)
  {
    $customer->Register();
    // create user account
  }

  public function showUserTransaction()
  {
    // show user transaction & call transaction class
  }

  public function proceedTransaction()
  {
    // proceed transaction & call transaction class to proceed
  }
}
