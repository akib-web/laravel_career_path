<?php

namespace App\Interfaces;

interface Registerable
{
  public function register(string $filename, $storage);
}