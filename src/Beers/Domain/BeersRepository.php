<?php

namespace App\Beers\Domain;

interface BeersRepository
{
    public function searchByFoodString(FoodString $string): array;

}