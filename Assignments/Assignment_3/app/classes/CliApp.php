<?php

declare(strict_types=1);

class CliApp
{
  private const LOGIN = 1;
  private const REGISTRATION = 2;

  private array $options = [
    self::LOGIN => 'Login',
    self::REGISTRATION => 'Registration',
  ];



  public function run()
  {
    printf("Choose Option \n");
    foreach ($this->options as $key => $value) {
      printf("%d. %s \n", $key, $value);
    }

    $user_input = readline('Select option: ');

    switch ($user_input) {
      case self::LOGIN:
        printf('login');
        break;
      case self::REGISTRATION:
        printf("Regidtration");
        break;
      default:
        printf("invalid");
    }
  }
}
