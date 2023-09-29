<?php

namespace App\Classes;

use App\Classes\TransactionType;

class WithdrawTransaction extends Transaction
{
  public function __construct()
  {
    $this->type = TransactionType::WITHDRAW;
  }
}
