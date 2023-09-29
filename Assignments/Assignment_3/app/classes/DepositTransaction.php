<?php

namespace App\Classes;

use App\Classes\TransactionType;

class DepositTransaction extends Transaction
{
  public function __construct()
  {
    $this->type = TransactionType::DEPOSIT;
  }
}
