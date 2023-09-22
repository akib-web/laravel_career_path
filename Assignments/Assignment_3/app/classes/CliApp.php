<?php

declare(strict_types=1);

namespace App\Classes;

use App\Classes\BankingManager;
use App\Classes\Customer;

class CliApp
{
  private const LOGIN = 1;
  private const REGISTRATION = 2;

  private BankingManager $banking_manager;

  private array $options = [
    self::LOGIN => 'Login',
    self::REGISTRATION => 'Registration',
  ];

  public function __construct()
  {
    $this->banking_manager = new BankingManager();
  }

  public function run()
  {
    printf("Choose Option \n");
    foreach ($this->options as $key => $value) {
      printf("%d. %s \n", $key, $value);
    }

    $user_input = readline('Select option: ');

    switch ($user_input) {
      case self::LOGIN:
        $this->banking_manager->loginUser();
        break;
      case self::REGISTRATION:
        // printf("Registration");
        $this->banking_manager->createUserAccount(new Customer());
        break;
      default:
        printf("invalid");
    }
  }
}
