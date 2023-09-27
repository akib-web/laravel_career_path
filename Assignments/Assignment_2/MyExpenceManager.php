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

        foreach ($expenceCategories as $key => $value) {
            $categories[] = new ExpenceCategory($value);
        }
        $this->storage->saveData(Category::getModelName(), $categories);
    }

    public function addIncome(float $amount, string $category)
    {
        $category = $this->getCategory($category, TransactionType::INCOME);

        if (!isset($category)) {
            printf("Category is not found! \n");
            return;
        }

        $income = new Income();
        $income->setAmount($amount);
        $income->setCategory($category);

        $this->transactions[] = $income;

        printf("Expense added successfully!\n");

        $this->saveTransaction();
    }

    public function viewIncome()
    {
        printf("==============================\n");
        foreach ($this->transactions as $transaction) {
            if ($transaction->getCategory()->getType() === TransactionType::INCOME) {
                printf("Amount: %s, Type: %s\n", $transaction->getAmount(), $transaction->getCategory()->getName());
            }
        }
        printf("==============================\n\n");
    }

    public function addExpence(float $amount, string $category)
    {
        $category = $this->getCategory($category, TransactionType::EXPENCE);

        if (!isset($category)) {
            printf("Category is not found! \n");
            return;
        }

        $expnece = new Expence();
        $expnece->setAmount($amount);
        $expnece->setCategory($category);

        $this->transactions[] = $expnece;

        $this->saveTransaction();
        printf("Expence Has been added successfully! \n");
    }

    public function viewExpence(): void
    {
        foreach ($this->transactions as $transaction) {
            if ($transaction->getCategory()->getType() === TransactionType::EXPENCE) {
                printf("%.2f : %s \n", $transaction->getAmount(), $transaction->getCategory()->getName());
            }
        }
    }

    public function showCategories(): void
    {
        printf("==============================\n");
        foreach ($this->categories as $category) {
            printf("Name: %s, Type: %s\n", $category->getName(), $category->getType()->name);
        }
        printf("==============================\n\n");
    }

    public function getCategory(string $name, TransactionType $type)
    {
        foreach ($this->categories as $category) {
            if ($category->getName() === $name && $category->getType() == $type) {
                return $category;
            }
        }
    }

    public function saveTransaction()
    {
        $this->storage->saveData(Transaction::getFileName(), $this->transactions);
    }
}