<?php

declare(strict_types=1);

namespace App\Classes;

use App\Classes\User;
use App\Classes\Bank;
use App\Classes\DataStorage;

class CliApp
{
  private const LOGIN = 1;
  private const REGISTRATION = 2;

  private Bank $bank;

  private array $LoginOptions = [
    self::LOGIN => 'Login',
    self::REGISTRATION => 'Registration',
  ];

  public function __construct()
  {
    $this->bank = new Bank(new DataStorage());
  }

  public function run()
  {
    printf("Choose Option \n");
    foreach ($this->LoginOptions as $index => $title) {
      printf("%d. %s \n", $index, $title);
    }

    $user_input = readline('Select option: ');

    switch ($user_input) {
      case self::LOGIN:
        $this->bank->customerLogin(new User());
        break;
      case self::REGISTRATION:
        $this->bank->customerRegistration(new User());
        break;
      default:
        printf("# === invalid === (404!) \n");
        $this->run();
    }
  }
}