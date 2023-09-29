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
  private const LOGOUT = 6;

  private array $transactions;
  private Customer $customer;
  private DataStorage $dataStorage;

  public array $options = [
    self::TRANSACTION => "Transaction",
    self::DEPOSIT => "Deposit",
    self::WITHDRAW => "Withdraw",
    self::TRANSFER => "Transfer",
    self::CURRENT_BALANCE => "Current Balance",
    self::LOGOUT => "Logout",
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
    $select = readline("Select Your choice : ");

    switch ($select) {
      case self::TRANSACTION:
        $this->transactionList();
        $this->show();
        break;

      case self::DEPOSIT:
        $amount = readline("Enter Amount : \n");
        $this->deposit($this->customer, TransactionStatus::COMPLETED, $amount);
        $this->show();
        break;

      case self::WITHDRAW:
        $amount = readline("Enter Amount : \n");
        $this->withdraw($this->customer, TransactionStatus::COMPLETED, $amount);
        $this->show();
        break;

      case self::TRANSFER:
        $email = readline("Enter Transfer Email: ");
        $amount = readline("Enter Amount : \n");
        $this->depositOthers($email, $amount);
        $this->show();
        break;

      case self::CURRENT_BALANCE:
        $this->checkBalance();
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
  public function checkBalance()
  {
    $transactions = $this->transactions[$this->customer->getBankAcc()];

    (float) $balance = 0;

    foreach ($transactions as $key => $value) {
      if ($value->getType() === TransactionType::DEPOSIT) {
        $balance += $value->getAmount();
      } else if ($value->getType() === TransactionType::WITHDRAW) {
        $balance -= $value->getAmount();
      }
    }
    printf("Your Current Blanace is : %.2f \n", $balance);
  }

  public function withdraw(Customer $customer, TransactionStatus $status, float $amount)
  {
    $withdraw = new WithdrawTransaction();
    $withdraw->setCustomer($customer);
    $withdraw->setAmount($amount);
    $withdraw->setStatus($status);

    $this->transactions[$customer->getBankAcc()][] = $withdraw;

    $this->dataStorage->saveData(Transaction::getModelName(), $this->transactions);

    printf("%.2f amount has been withdrawn from account: %d \n", $amount, $customer->getBankAcc());
  }

  public function deposit(Customer $customer, TransactionStatus $status, float $amount)
  {
    $deposit = new DepositTransaction();
    $deposit->setCustomer($customer);
    $deposit->setAmount($amount);
    $deposit->setStatus($status);

    $this->transactions[$customer->getBankAcc()][] = $deposit;

    $this->dataStorage->saveData(Transaction::getModelName(), $this->transactions);
    printf("%.2f amount has been Deposited to account: %d \n", $amount, $customer->getBankAcc());
  }

  public function depositOthers(string $email, float $amount)
  {
    $customers = $this->dataStorage->loadData(Customer::getModelName());

    foreach ($customers as $key => $customer) {
      if ($customer->getEmail() === $email) {
        $this->deposit($customer, TransactionStatus::COMPLETED, $amount);
        $this->withdraw($this->customer, TransactionStatus::COMPLETED, $amount);
        return;
      }
    }
    printf("Sorry, Email not found!");
  }

  public function transactionList()
  {
    if (!isset($this->transactions[$this->customer->getBankAcc()])) {
      printf("===== No Transaction found! ===== \n");
      return;
    }
    printf("============== Transaction (%d) ================== \n", $this->customer->getBankAcc());
    printf(" ACC_number |   Type  | Amount | Status\n");
    foreach ($this->transactions[$this->customer->getBankAcc()] as $key => $transaction) {
      $key++;
      $customer = $transaction->getCustomer();
      $accNumber = $customer->getBankAcc();
      $type = $transaction->getType()->name;
      $amount = $transaction->getAmount();
      $status = $transaction->getStatus()->name;

      printf(" %d | %s | %.2f | %s \n", $accNumber, $type, $amount, $status);
      // printf("ACC_number: %d ; Type: %s ; Amount: %.2f \n", $accNumber, $type, $amount);
    }
    printf("============================================= \n");
  }
}
