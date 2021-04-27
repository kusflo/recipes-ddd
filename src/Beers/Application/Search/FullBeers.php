<?php


namespace App\Beers\Application\Search;

use App\Beers\Domain\BeersFactory;
use App\Beers\Domain\BeersRepository;
use App\Beers\Domain\FoodString;

class FullBeers
{
    private BeersRepository $repository;


    public function __construct(BeersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FoodString $food): array
    {
        $beers = [];
        $array = $this->repository->searchByFoodString($food);
        foreach($array as $item) {
            $beers[] = BeersFactory::full($item);
        }
        return $beers;
    }

}