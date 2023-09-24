<?php

namespace App\Interfaces;

interface Authenticatable
{
  public function login(string $email, string $password);
}