<?php

namespace App\Classes;

class AdminDashboard
{
  private const TRANSACTIONS = 1;
  private const SEARCH = 2;
  private const CUSTOMERS = 3;
  private const LOGOUT = 4;

  private Customer $customer;
  private DataStorage $dataStorage;

  public array $options = [
    self::TRANSACTIONS => "Transactions List",
    self::SEARCH => "Search Transaction",
    self::CUSTOMERS => "Search Transaction",
    self::LOGOUT => "Logout",
  ];

  public function __construct(Customer $customer)
  {
    $this->customer = $customer;
    $this->dataStorage = new DataStorage();
  }

  public function show()
  {
    foreach ($this->options as $key => $value) {
      printf("%d. %s \n", $key, $value);
    }

    $this->controller();
  }
  public function controller()
  {
    $select = readline("Select Your choice : ");

    switch ($select) {
      case self::TRANSACTIONS:
        $this->show();
        break;

      case self::LOGOUT:
        die();
        break;

      default:
        printf("=== Wrong! === \n ");
        $this->show();
        break;
    }
  }
}