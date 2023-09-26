<?php

declare(strict_types=1);

class Transaction
{
  private TransactionType $type;
  private float $amount;
  private string $category;

  public static function getFileName()
  {
    return 'transations';
  }
  public function setAmount(float $amount): void
  {
    $this->amount = $amount;
  }

  public function getAmount(): float
  {
    return $this->amount;
  }

  public function setCategory(string $category): void
  {
    $this->category = $category;
  }

  public function getcategory(): string
  {
    return $this->category;
  }
}
