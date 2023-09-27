<?php

class ExpenceCategory extends Category
{
  public function __construct(string $name)
  {
    $this->type = TransactionType::EXPENCE;
    $this->name = $name;
  }
}