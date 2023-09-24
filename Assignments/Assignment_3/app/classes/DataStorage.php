<?php

namespace App\Classes;

use App\Interfaces\Storage;


class DataStorage implements Storage
{
  public function saveData(string $filename, array $data)
  {
    // save given data to the file

    file_put_contents($this->getDataFilePath($filename), serialize($data));
  }
  public function loadData(string $filename)
  {
    if (file_exists($this->getDataFilePath($filename))) {
      $data = unserialize(file_get_contents($this->getDataFilePath($filename)));
    }
    if (!isset($data) || !is_array($data)) {
      return [];
    }

    return $data;
    // load data from files if any data avaiable when call this method
  }
  public function getDataFilePath($filename)
  {
    return "app/data/" . $filename . ".txt";
    // get file stored data from the folder
  }
}