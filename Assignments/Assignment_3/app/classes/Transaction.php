<?php

namespace App\Classes;

use DateTime;

class Transaction
{
  private float $amount;
  private Customer $customer;

  public function getModelName()
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
}
