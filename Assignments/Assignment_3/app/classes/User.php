<?php

namespace App\Classes;

use App\Classes\AuthUser;

class User
{
  protected UserType $role;
  protected int $id;
  private string $name;
  private string $email;
  private string $password;

  public static function getModelName()
  {
    return 'users';
  }

  public function getID()
  {
    return $this->id;
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
}
