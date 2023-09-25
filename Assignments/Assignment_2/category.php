<?php

class Category {
    private string $name;
    private TransactionType $type;

    public static function getModelName(){
        return 'cateoryies';
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setType(TransactionType $type): void {
        $this->type = $type;
    }
    public function getType(): TransactionType {
        return $this->type;
    }

}