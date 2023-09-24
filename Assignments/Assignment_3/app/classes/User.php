<?php

namespace App\Classes;

use App\Interfaces\Storage;
use App\Interfaces\Authenticatable;
use App\Interfaces\Registerable;
use App\Classes\DataStorage;

class User implements Authenticatable, Registerable
{
  private DataStorage $DataStorage;

  public function __construct(){
    $this->DataStorage = new DataStorage();
  }
  public static function getFileName()
  {
    return 'users';
  }
  public function login(string $email, string $password)
  {
    // get Autheticate return then login
    printf('%s, %s', $email, $password);
    
    $data[] = $this->DataStorage->loadData('users');

    var_dump($data);

    // foreach ($users as $key => $value) {
    //   // var_dump($value);
    //   // die();
    //   if ($value['email'] == $user_email  &&  $value['password'] == $user_password) {
    //     $DataStorage->saveData('login', $value);
    //     $this->dashboard();
    //     break;
    //   }
    // }

    // var_dump($user_data);
  }

  public function register(string $filename, $storage)
  {
    $user_name = readline("Enter Name: ");
    $user_email = readline("Enter email: ");
    $user_password = readline("Enter Password: ");

    $data = [
      "id" => time(),
      "name" => $user_name,
      "email" => $user_email,
      "password" => $user_password
    ];
    
    $fileData = $storage->loadData($filename);
    array_push($fileData, $data);
    $storage->saveData($filename, $fileData);
  }

  public function dashboard()
  {
    printf("This is user dashboard");
  }
}