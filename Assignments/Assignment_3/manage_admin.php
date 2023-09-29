<?php
require_once "vendor/autoload.php";

use App\Classes\Admin;
use App\Classes\AdminDashboard;
use App\Classes\DataStorage;
use App\Classes\User;
use App\Classes\UserType;

class CreateAdmin
{
  public DataStorage $dataStorage;
  public AdminDashboard $dashboard;
  public array $users;

  private const LOGIN = 1;
  private const REGISTRATION = 2;

  private array $LoginOptions = [
    self::LOGIN => 'Login',
    self::REGISTRATION => 'Registration',
  ];

  public function __construct()
  {
    $this->dataStorage = new DataStorage();
    $this->users = $this->dataStorage->loadData(User::getModelName());
  }
  public function run()
  {
    printf("Choose Option \n");
    foreach ($this->LoginOptions as $index => $title) {
      printf("%d. %s \n", $index, $title);
    }

    $user_input = readline('Select option: ');

    switch ($user_input) {
      case self::LOGIN:
        $this->adminLogin();
        break;
      case self::REGISTRATION:
        $this->create();
        break;
      default:
        printf("# === invalid === (404!) \n");
        $this->run();
    }
  }



  public function create()
  {
    $name = readline("Name : \n");
    $email = readline("Email : \n");
    $password = readline("Password : \n");

    $newAdmin = new Admin();
    $newAdmin->setName($name);
    $newAdmin->setEmail($email);
    $newAdmin->setPassword($password);

    $this->users[] = $newAdmin;

    $this->dataStorage->saveData(User::getModelName(), $this->users);
    printf("New Admin has been created. Please Login here \n");

    $this->adminLogin();
  }
  public function adminLogin()
  {
    $email = readline("Enter email: ");
    $password = readline("Enter Password: ");

    foreach ($this->users as $key => $value) {
      if ($value->getRole() === UserType::ADMIN && $value->getEmail() === $email && $value->getPassword() === $password) {
        $this->dashboard = new AdminDashboard($value);
        printf("Login Success! \n");
        printf("============== Admin DashBoard (%s) ================== \n", $value->getEmail());
        $this->dashboard->show();
        return;
      }
    }
    printf("500! login failed! \n");
  }
}

$createAdmin = new CreateAdmin();

$createAdmin->run();
