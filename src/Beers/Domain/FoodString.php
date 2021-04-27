<?php


namespace App\Beers\Domain;


use App\Beers\Shared\Domain\ValueObject\StringValueObject;

class FoodString extends StringValueObject
{

    public function __construct(string $value)
    {
        $value = $this->formatString($value);
        parent::__construct($value);
    }

    private function formatString(string $value): string
    {
        return strtolower(str_replace(' ', '_', $value));
    }

}