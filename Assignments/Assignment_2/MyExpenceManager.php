<?php

class MyExpenceManager
{
    private Storage $storage;
    private array $categories;
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
        $this->categories = $this->storage->loadData(Category::getModelName());

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
    }

    public function showCategories(): void
    {
        printf("---------------------------------\n");
        foreach ($this->categories as $category) {
            printf("Name: %s, Type: %s\n", $category->getName(), $category->getType()->name);
        }
        printf("---------------------------------\n\n");
    }
}
