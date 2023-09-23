<?php
namespace App\Classes;
use App\Classes\DataStorage;

class Registration {
    private string $name;
    private string $email;

    private string $password;
    private DataStorage $data;

    public function __construct(){
        $this->data = new DataStorage();
    }

    public function setName(string $name){
        $this->name = $name;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }


    public function save(){
        $data = [
            "id" => time(), 
            "name" => $this->name, 
            "email" => $this->email,
            "password" => $this->password
        ];
        $this->data->saveData('customers',$data);
    }


}