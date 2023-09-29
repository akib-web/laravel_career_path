<?php

namespace App\Classes;

use App\Classes\DepositTransaction;
use App\Classes\Customer;
use App\Classes\DataStorage;

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

  private array $transactions;
  private Customer $customer;
  private DataStorage $dataStorage;

  public array $options = [
    self::TRANSACTION => "Transaction",
    self::DEPOSIT => "Deposit",
    self::WITHDRAW => "Withdraw",
    self::TRANSFER => "Transfer",
    self::CURRENT_BALANCE => "Current Balance",
  ];

  public function __construct(Customer $customer)
  {
    $this->customer = $customer;
    $this->dataStorage = new DataStorage();

    $this->transactions = $this->dataStorage->loadData(Transaction::getModelName());
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
        foreach ($this->transactions as $key => $transaction) {
          var_dump($transaction);
          die();
          $key++;
          $accNumber = $transaction->getCustomer();
          $accNumber = $accNumber->getAccNumber();
          $type = $transaction->type;
          $amount = $transaction->getAmount();
          printf("ACC_number: %d ; Type: %s ; Amount: %.2f \n", $accNumber, $type, $amount);
          // var_dump($transaction);
        }
        break;

      case self::DEPOSIT:
        $depositAmount = readline("Enter Amount : \n");

        $deposit = new DepositTransaction();
        $deposit->setCustomer($this->customer);
        $deposit->setAmount($depositAmount);
        $deposit->setStatus(TransactionStatus::COMPLETED);

        $this->transactions[$this->customer->getBankAcc()][] = $deposit;

        $this->dataStorage->saveData(Transaction::getModelName(), $this->transactions);
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
