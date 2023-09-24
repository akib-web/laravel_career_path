<?php

namespace App\Classes;

use App\Classes\User;
use App\Interfaces\Storage;
use App\Classes\Registration;

class Customer extends User
{
  private Storage $storage;

  public function __construct(Storage $storage)
  {
    $this->storage = $storage;
  }

  // public function register(array $data)
  // {
  //   // printf("Registerable customer methos is proccessing! \n");
  //   // get register data and register

  //   $user_name = readline("Enter Name: ");
  //   $user_email = readline("Enter email: ");
  //   $user_password = readline("Enter Password: ");


  //   $registration = new Registration();
  //   $registration->setName($user_name);
  //   $registration->setEmail($user_email);
  //   $registration->setPassword($user_password);
  //   $registration->save();

  //   printf('Customer data has been saved');
  // }
}