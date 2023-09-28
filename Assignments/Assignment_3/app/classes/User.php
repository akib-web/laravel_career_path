<?php

namespace App\Classes;

use App\Classes\AuthUser;

class User
{
  protected UserType $role;
  private string $name;
  private string $email;
  private string $password;

  public static function getModelName()
  {
    return 'users';
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }

  public function login()
  {
    $email = $this->email;
    $password = $this->password;

    if (isset($email) && isset($password)) {
      print("loging logic process....!");
    } else {
      printf("404!.. Email or password not found!");
    }
  }
  public function register()
  {
    $role = $this->role;
    $name = $this->name;
    $email = $this->email;
    $password = $this->password;

    if (isset($role) && isset($name) && isset($email) && isset($password)) {
      print("registration logic processing....!");
    } else {
      printf("404!.. Email or password not found!");
    }
  }
}
