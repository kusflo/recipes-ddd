<?php


namespace App\Tests\Beers\Domain;

use App\Beers\Application\Search\BeerSearchResponse;
use App\Beers\Domain\BeersFactory;

class BeerMother
{

    public static function getBeerSearchResponseList(): array
    {
        return array(
            self::getBeerSearchResponse(1),
            self::getBeerSearchResponse(2),
            self::getBeerSearchResponse(3),
        );
    }

    private static function getBeerSearchResponse($id)
    {
        return new BeerSearchResponse(
                $id,
                'name',
                'description',
                'https://images.punkapi.com/v2/12.png',
                'slogan',
                '12/2015'
        );
    }

}