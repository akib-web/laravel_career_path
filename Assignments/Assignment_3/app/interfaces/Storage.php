<?php

namespace App\Interfaces;

interface Storage
{
  public function saveData(string $filename, array $data);

  public function loadData(string $filename);

  public function getDataFilePath(string $filename);
}