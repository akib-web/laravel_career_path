<?php

namespace App\Classes;

class AdminDashboard
{
  private const TRANSACTIONS = 1;
  private const SEARCH = 2;
  private const CUSTOMERS = 3;
  private const LOGOUT = 4;

  private array $transactions;
  private array $customers;
  private DataStorage $dataStorage;

  public array $options = [
    self::TRANSACTIONS => "Transaction List",
    self::SEARCH => "Search Transaction",
    self::CUSTOMERS => "Customer List",
    self::LOGOUT => "Logout",
  ];

  public function __construct()
  {
    $this->dataStorage = new DataStorage();
    $this->transactions = $this->dataStorage->loadData(Transaction::getModelName());
    $this->customers = $this->dataStorage->loadData(Customer::getModelName());
  }

  public function show()
  {
    printf("Select option: \n");
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
        $loop = 1;
        foreach ($this->transactions as $key => $value) {
          foreach ($value as $transaction) {
            printf("%d. Email: %s ;  Type: %s ; Amount: %.2f \n", $loop, $transaction->getCustomer()->getEmail(), $transaction->getType()->name, $transaction->getAmount());
            $loop++;
          }
        }
        $this->show();
        break;
      case self::SEARCH:
        $query = readline("Search with email: ");
        $loop = 1;
        foreach ($this->transactions as $key => $value) {
          foreach ($value as $transaction) {
            if ($transaction->getCustomer()->getEmail() === $query) {
              printf("%d. Email: %s ;  Type: %s ; Amount: %.2f \n", $loop, $transaction->getCustomer()->getEmail(), $transaction->getType()->name, $transaction->getAmount());
              $loop++;
            }
          }
        }
        $this->show();
        break;
      case self::CUSTOMERS:
        $loop = 1;
        foreach ($this->customers as $customer) {
          printf("%d. Email: %s ; Name: %s \n", $loop, $customer->getEmail(), $customer->getName());
          $loop++;
        }
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
