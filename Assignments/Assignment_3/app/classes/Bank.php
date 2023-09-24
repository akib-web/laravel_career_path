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
  private array $customer;

  public function __construct(Storage $storage)
  {
    $this->storage = $storage;

    $this->customer = $this->storage->loadData('customers');
  }
  // login user
  public function customerLogin(Authenticatable $user)
  {    
    $email = readline("Enter email: ");
    $password = readline("Enter Password: ");
    $user->login($email,$password);
  }
  //registration new user
  public function customerRegistration(Registerable $customer)
  {
    // $user->register(User::getFileName(), $this->storage);
    // $this->userLogin(new User());
  }
}