<?php

namespace App\Classes;

class UserDashboard
{
  // See all of their transactions
  // Deposit money to their account
  // Withdraw money from their account
  // Transfer money to another customer account (given their email address)
  // See the current balance of the account
  private const TRANSACTION = 1;
  private const DEPOSIT = 2;
  private const WITHDRAW = 3;
  private const TRANSFER = 4;
  private const CURRENT_BALANCE = 5;

  private Transaction $transaction;

  public array $options = [
    self::TRANSACTION => "Transaction",
    self::DEPOSIT => "Deposit",
    self::WITHDRAW => "Withdraw",
    self::TRANSFER => "Transfer",
    self::CURRENT_BALANCE => "Current Balance",
  ];

  public function __construct()
  {
    $this->transaction = new Transaction();
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
    $select = readline("Select Your choise : ");

    switch ($select) {
      case self::TRANSACTION:
        // $this->transaction->showAll();
        break;

      case self::DEPOSIT:
        $this->transaction->deposit();
        break;

      case self::WITHDRAW:
        # code...
        break;

      case self::TRANSFER:
        # code...
        break;

      case self::CURRENT_BALANCE:
        # code...
        break;

      default:
        # code...
        break;
    }
  }
}