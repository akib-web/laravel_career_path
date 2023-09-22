<?php

// declare(strict_types=1);

//initiate the class to start the app
$expences = new ExpenceTracker();
$expences->start();

class ExpenceTracker
{
    public int $user_input;
    public $user_income;
    public $user_expence;
    public $user_savings;

    public array $options = [
        1 => "1. Add income",
        2 => "2. Add expense",
        3 => "3. View incomes",
        4 => "4. View expenses",
        5 => "5. View savings",
        6 => "6. View categories",
    ];
    public array $categories = [
        "income" => [
            "1. Salary",
            "2. Tutionee",
            "3. Freelancing",
        ],
        "expence" => [
            "Gadget",
            "Tutorials",
            "Snacks",
            "Lunch",
            "Learning materials",
        ]
    ];
    public function __construct()
    {
        //todo something
    }
    public function start()
    {
        $this->showAllOptions();
    }
    public function showAllOptions()
    {
        printf("\n\nSelect Your choise \n\n");
        array_map(function ($value) {
            printf($value . ",\n");
        }, $this->options);

        $this->user_input = readline("\nChoose Your option:");

        $this->manupulateActions($this->user_input);
    }

    private function manupulateActions($type)
    {
        if ($type == 1) {
            return $this->addIncome();
        } elseif ($type == 2) {
            return $this->addExpence();
        } elseif ($type == 3) {
            return $this->viewIncomes();
        } elseif ($type == 4) {
            return $this->viewExpences();
        } elseif ($type == 5) {
            return $this->viewSavings();
        } elseif ($type == 6) {
            return $this->viewCategories();
        } else {
            printf("Your entered number ($type) is wrong ");
        }
    }

    public function addIncome()
    {

        array_map(function ($value) {
            printf($value . ",\n");
        }, $this->categories["income"]);

        $category = readline("\nChoose income category:");

        $new_income = readline("\nAdd Income : ");
        $old_income = $this->user_income ?? 0;
        $total_income = $old_income + $new_income;
        $this->user_savings = $this->user_income - $this->user_expence;

        $this->user_income = $total_income;

        printf("Income added $new_income \n");

        $this->showAllOptions();
    }

    public function viewIncomes()
    {
        printf('Total income : ' . $this->user_income . "\n");

        $this->showAllOptions();
    }

    public function addExpence()
    {
        $new_expence = readline("\nAdd Expence : ");
        $old_expence = $this->user_expence ?? 0;
        $total_expence = $old_expence + $new_expence;
        $this->user_savings = $this->user_income - $this->user_expence;

        $this->user_expence = $total_expence;

        printf("Expence added $new_expence \n");
        $this->showAllOptions();
    }

    public function viewExpences()
    {
        printf('viewExpences' . $this->user_expence);

        $this->showAllOptions();
    }
    public function viewSavings()
    {
        printf('viewSavings' . $this->user_savings);

        $this->showAllOptions();
    }
    public function viewCategories()
    {
        printf('viewCategories' . $this->user_income);

        $this->showAllOptions();
    }

    public function storeData()
    {
        // Define the content you want to write to the new PHP file
        $newFileContent = '<?php
        echo "Hello, this is a dynamically created PHP file!";
        ?>';

        // Specify the filename
        $filename = 'newfile.php';

        // Use file_put_contents to create the file and write the content
        if (file_put_contents($filename, $newFileContent) !== false) {
            echo "File created successfully!";
        } else {
            echo "Error creating the file.";
        }
    }
}
