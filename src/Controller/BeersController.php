<?php

namespace App\Controller;


use App\Beers\Application\Search\FullBeers;
use App\Beers\Application\Search\SimpleBeers;
use App\Beers\Domain\Beer;
use App\Beers\Domain\FoodString;
use App\Beers\Infrastructure\PunkApiBeersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BeersController extends AbstractController
{
    /**
     * Routes example
     * https://127.0.0.1:8000/simple/query=tomato
     * https://127.0.0.1:8000/simple/query=tomato_salad
     *
     */
    public function simple($food)
    {

        $foodString = new FoodString($food);
        $repository = new PunkApiBeersRepository();
        $simpleBeersSearch = new SimpleBeers($repository);
        $beers = $simpleBeersSearch->__invoke($foodString);

        return new JsonResponse(Beer::simpleListToArray($beers));
    }

    /**
     * Routes example
     * https://127.0.0.1:8000/full/query=tomato
     * https://127.0.0.1:8000/full/query=tomato_salad
     *
     */
    public function full($food)
    {
        $foodString = new FoodString($food);
        $repository = new PunkApiBeersRepository();
        $fullBeersSearch = new FullBeers($repository);
        $beers = $fullBeersSearch->__invoke($foodString);

        return new JsonResponse(Beer::fullListToArray($beers));
    }



}
