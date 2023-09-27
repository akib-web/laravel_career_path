<?php

class Expence extends Transaction
{
  public function __construct()
  {
    $this->type = TransactionType::EXPENCE;
  }
}