<?php

namespace App\Classes;

use App\Classes\TransactionType;

class Transaction
{
  private float $amount;
  protected TransactionType $type;
  protected TransactionStatus $status;
  private Customer $customer;

  public static function getModelName()
  {
    return "transactions";
  }

  public function setCustomer(Customer $customer)
  {
    $this->customer = $customer;
  }

  public function getCustomer()
  {
    return $this->customer;
  }

  public function setAmount(float $amount)
  {
    $this->amount = $amount;
  }

  public function getAmount()
  {
    return $this->amount;
  }
  public function setStatus(TransactionStatus $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function getType()
  {
    return  $this->type;
  }
}