<?php


namespace App\Beers\Application\Search;

use App\Beers\Domain\BeersRepository;
use App\Beers\Domain\FoodString;

class SimpleBeers
{
    private BeersRepository $repository;


    public function __construct(BeersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FoodString $food): ?array {
        return $this->repository->searchByFoodString($food);
    }

}