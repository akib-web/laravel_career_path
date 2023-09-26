<?php

class MyExpenceManager
{
    private Storage $storage;
    private array $categories;
    private array $transactions;
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
        $this->categories = $this->storage->loadData(Category::getModelName());
        $this->transactions = $this->storage->loadData(Transaction::getFileName());

        if (!isset(($this->categories)[0])) {
            $this->createDefaultCategories();
            $this->categories = $this->storage->loadData(Category::getModelName());
        }
    }

    private function createDefaultCategories()
    {
        $incomeCategories = [
            'salary',
            'Freelancing',
            'tution'
        ];
        $expenceCategories = [
            'House Rent',
            'Family',
            'Grocery',
            'Food',
            'Treatments'
        ];

        $categories = [];

        foreach ($incomeCategories as $key => $value) {
            $categories[] = new IncomeCategory($value);
        }

        $this->storage->saveData(Category::getModelName(), $categories);
    }

    public function addIncome(float $amount, string $category)
    {

        $income = new Income();
        $income->setAmount($amount);
        $income->setCategory($category);
        
        $this->transactions[] = $income;

        printf("Expense added successfully!\n");

        $this->saveTransaction();
    }

    public function viewIncome(){
        printf("---------------------------------\n");
        foreach ($this->transactions as $transaction) {
            printf("Amount: %s, Type: %s\n", $transaction->getAmount(), $transaction->getCategory());
        }
        printf("---------------------------------\n\n");
    }

    public function showCategories(): void
    {
        printf("---------------------------------\n");
        foreach ($this->categories as $category) {
            printf("Name: %s, Type: %s\n", $category->getName(), $category->getType()->name);
        }
        printf("---------------------------------\n\n");
    }

    public function saveTransaction(){
        $this->storage->saveData(Transaction::getFileName(), $this->transactions);
    }
}
