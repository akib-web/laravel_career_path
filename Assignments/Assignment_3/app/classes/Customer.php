<?php

namespace App\Classes;

use App\Classes\User;
use App\Classes\DataStorage;
use App\Classes\Registration;
use App\Interfaces\Registerable;

class Customer extends User implements Registerable
{
  private DataStorage $data;
  public function __construct(){
    // $this->data = new DataStorage();
  }
  public function Register()
  {
    // printf("Registerable customer methos is proccessing! \n");
    // get register data and register

    $user_name = readline("Enter Name: ");
    $user_email = readline("Enter email: ");
    $user_password = readline("Enter Password: ");

    
    $registration = new Registration();
    $registration->setName($user_name);
    $registration->setEmail($user_email);
    $registration->setPassword($user_password);
    $registration->save();

    printf('Customer data has been saved');
  }
}
