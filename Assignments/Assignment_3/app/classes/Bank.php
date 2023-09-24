<?php

namespace App\Classes;

use App\Classes\User;
use App\Interfaces\Authenticatable;
use App\Interfaces\Storage;
use App\Interfaces\Registerable;

/**
 * create a class that will manage BankingManager proccess
 *  1. bank has to perform user account creation, show user'r transaction, trasaction proccess
 *  2. 
 */

class Bank
{
  private Storage $storage;
  private array $user;

  public function __construct(Storage $storage)
  {
    $this->storage = $storage;

    $this->user = $this->storage->loadData('users');
  }
  // login user
  public function userLogin(Authenticatable $user)
  {
    $user->login($this->user);
  }
  //registration new user
  public function userRegistration(Registerable $user)
  {
    $user->register(User::getFileName(), $this->storage);
    $this->userLogin(new User());
  }
}