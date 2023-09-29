<?php

namespace App\Classes;

use App\Classes\Storage;

/**
 * create a class that will manage BankingManager proccess
 *  1. bank has to perform user account creation, show user'r transaction, trasaction proccess
 */

class Bank
{
  private Storage $storage;
  private UserDashboard $dashboard;
  private array $customers;

  public function __construct(Storage $storage)
  {
    $this->storage = $storage;
    $this->customers = $storage->loadData(Customer::getModelName());
  }
  // login user
  public function customerLogin()
  {
    $email = readline("Enter email: ");
    $password = readline("Enter Password: ");

    foreach ($this->customers as $key => $value) {
      if ($value->getRole() === UserType::CUSTOMER && $value->getEmail() === $email && $value->getPassword() === $password) {
        $this->dashboard = new UserDashboard($value);
        printf("Login Success! \n");
        printf("============== DashBoard (%s) ================== \n", $value->getEmail());
        $this->dashboard->show();
        return;
      }
    }
    printf("500! login failed! \n");

    // var_dump($this->customers);
  }
  //registration new user
  public function customerRegistration()
  {
    $name = readline("Enter Name: ");
    $email = readline("Enter email: ");
    $password = readline("Enter Password: ");

    $newCustomer = new Customer();
    $newCustomer->setName($name);
    $newCustomer->setEmail($email);
    $newCustomer->setPassword($password);
    $this->customers[] = $newCustomer;
    $this->storage->saveData(Customer::getModelName(), $this->customers);
    printf("Registration successfull. \n");
    printf("========== Login here ============ \n");
    $this->customerLogin();
  }
}
