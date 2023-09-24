<?php

namespace App\Interfaces;

interface Authenticatable
{
  public function login(array $data);
}