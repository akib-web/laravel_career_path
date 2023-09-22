<?php

class ExpenceTrack{
    public $user_Input;
    public array $Total_Options = [
        "1. Add income",
        "2. Add expense",
        "3. View incomes",
        "4. View expenses",
        "5. View savings",
        "6. View categories",
    ];
    public function start(){
        $this->showAllOptions();
    }
    public function showAllOptions(){
        printf(  "\n\nSelect Your choise \n\n" );
        array_map(function($value){
            printf( $value.",\n" );
        },$this->Total_Options); 
     
        $this->getUserInput();
    }

    private function getUserInput(){
        $this->user_Input = readline("\nEnter your option:");
        // $this->manupulateActions();
    }
}
class Result extends ExpenceTrack{
    public function calculation(Calculation $calculations){
        $calculations->calculate('test');
    }
}

interface Calculation{
    public function calculate(string $user_Input);
}
class Income implements Calculation{
    public function calculate(string $user_Input='test'){
        return "income calculate";
    }
}




// $Income = new Income();
$Result = new Result();


// class Categories extends ExpenceTrack{
//     public array $categories = [
//         "income"=>[
//             "Salary",
//             "Tutionee",
//             "Freelancing",
//         ],
//         "expence"=>[
//             "Gadget",
//             "Tutorials",
//             "Snacks",
//             "Lunch",
//             "Learning materials",
//         ]
//     ];
//     public function __construct(){
//         $this->viewCategorries();
//     }
//     public function addCategorries($type,$name){
//         //todo something
//         return 'add categories';
//     }
//     public function viewCategorries(){
//         //todo something
//         return $this->categories;
//     }
// }
