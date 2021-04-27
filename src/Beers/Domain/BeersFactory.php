<?php


namespace App\Beers\Domain;


use App\Beers\Application\Search\BeerSearchResponse;

class BeersFactory
{

    public static function simple(BeerSearchResponse $response) {
        return new Beer(
            new BeerID($response->id()),
            new BeerName($response->name()),
            new BeerDescription($response->description()),
            null,
            null,
            null
        );
    }

    public static function full(BeerSearchResponse $response) {
        return new Beer(
            new BeerID($response->id()),
            new BeerName($response->name()),
            new BeerDescription($response->description()),
            new BeerImage($response->img()),
            new BeerSlogan($response->slogan()),
            new BeerDateCreated(\DateTimeImmutable::createFromFormat('m/Y', $response->dateCreated()))
        );
    }


}