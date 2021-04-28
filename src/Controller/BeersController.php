<?php

namespace App\Controller;


use App\Beers\Application\Search\FullBeers;
use App\Beers\Application\Search\SimpleBeers;
use App\Beers\Domain\Beer;
use App\Beers\Domain\FoodString;
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
    public function simple($food, SimpleBeers $simpleBeersSearch): JsonResponse
    {

        $foodString = new FoodString($food);
        $beers = $simpleBeersSearch($foodString);

        return new JsonResponse(
            Beer::simpleListToArray($beers),
            200,
            ['Access-Control-Allow-Origin' => '*']);
    }

    /**
     * Routes example
     * https://127.0.0.1:8000/full/query=tomato
     * https://127.0.0.1:8000/full/query=tomato_salad
     *
     */
    public function full($food, FullBeers $fullBeersSearch): JsonResponse
    {
        $foodString = new FoodString($food);
        $beers = $fullBeersSearch($foodString);

        return new JsonResponse(
            Beer::fullListToArray($beers),
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }



}
