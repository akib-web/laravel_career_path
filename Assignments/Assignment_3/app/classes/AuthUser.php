<?php

namespace App\Classes;

interface AuthUser
{
  public function login();

  public function register();
}