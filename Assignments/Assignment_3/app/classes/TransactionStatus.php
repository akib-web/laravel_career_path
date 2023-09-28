<?php

namespace App\Classes;

enum TransactionStatus
{
  case PENDING;
  case COMPLETED;
  case CANCELLED;
}