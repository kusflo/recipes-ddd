<?php


namespace App\Tests\Beers\Domain;

use App\Beers\Application\Search\BeerSearchResponse;
use App\Beers\Domain\BeersFactory;

class BeerMother
{

    public static function validList(): array
    {
        return array(
            self::getValidBeer(1),
            self::getValidBeer(2),
            self::getValidBeer(3),
        );
    }

    private static function getValidBeer($id)
    {
        return BeersFactory::simple(
            new BeerSearchResponse(
                $id,
                'name',
                'description',
                null,
                null,
                null
            )
        );
    }

}