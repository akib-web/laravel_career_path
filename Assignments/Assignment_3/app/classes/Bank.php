<?php

namespace App\Classes;

use App\Classes\User;
use App\Interfaces\Registerable;

/**
 * create a class that will manage banking proccess
 *  1. bank has to perform user account creation, show user'r transaction, trasaction proccess
 *  2. 
 */

class Bank
{
  private User $user;
  public function userManage(User $user)
  {
  }
  public function createUserAccount(Registerable $customer)
  {
    $customer->Register($this->user);
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
