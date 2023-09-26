<?php

class CLIApp
{
    private MyExpenceManager $MyExpenceManager;
    private const ADD_INCOME = 1;
    private const ADD_EXPENCE = 2;
    private const VIEW_EXPENCE = 3;
    private const VIEW_INCOME = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATEGORIES = 6;
    private array $options = [
        self::ADD_INCOME => 'ADD_INCOME',
        self::ADD_EXPENCE => 'ADD_EXPENCE',
        self::VIEW_EXPENCE => 'VIEW_EXPENCE',
        self::VIEW_INCOME => 'VIEW_INCOME',
        self::VIEW_SAVINGS => 'VIEW_SAVINGS',
        self::VIEW_CATEGORIES => 'VIEW_CATEGORIES',
    ];
    public function __construct()
    {
        $this->MyExpenceManager = new MyExpenceManager(new FileStorage());
    }
    public function run()
    {
        printf("\n");
        foreach ($this->options as $index => $title) {
            printf("%d . %s \n", $index, $title);
        }
        printf("\n");

        $select = readline('Select: ');

        switch ($select) {
            case self::ADD_INCOME:
                // printf("ADD_INCOME");
                // $this->run();
                $amount = readline('Enter amount: ');
                $category = readline('Enter category: ');
                $this->MyExpenceManager->addIncome($amount, $category);
                $this->run();
                break;
            case self::ADD_EXPENCE:
                printf("ADD_EXPENCE");
                $this->run();
                break;
            case self::VIEW_EXPENCE:
                printf("VIEW_EXPENCE");
                $this->run();
                break;
            case self::VIEW_INCOME:
                printf("VIEW_INCOME");
                $this->run();
                break;
            case self::VIEW_SAVINGS:
                printf("VIEW_SAVINGS");
                $this->run();
                break;
            case self::VIEW_CATEGORIES:
                printf("VIEW_CATEGORIES");
                $this->MyExpenceManager->showCategories();
                break;
            default:
                printf("EXIT");
                break;
        }
    }
}
