<?php

namespace App\Tests\Beers\Infrastructure;


use App\Beers\Domain\BeersRepository;
use App\Beers\Domain\FoodString;
use App\Tests\Beers\Domain\BeerMother;


class BeersRepositoryMother implements BeersRepository
{

    public function searchByFoodString(FoodString $text): array
    {
        return BeerMother::getBeerSearchResponseList();
    }
}