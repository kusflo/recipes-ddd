<?php

namespace App\Beers\Infrastructure;

use App\Beers\Application\Search\BeerSearchResponse;
use App\Beers\Domain\BeersFactory;
use App\Beers\Domain\BeersRepository;
use App\Beers\Domain\FoodString;
use GuzzleHttp\Client;

class PunkApiBeersRepository implements BeersRepository
{
    const URI_API_BEERS = 'https://api.punkapi.com/v2/beers?';

    public function searchByFoodString(FoodString $string): array
    {
        $param = 'food=' . $string->value();
        $json = $this->getJsonResponse($param);
        return $this->jsonToArrayBeersSearchResponse($json);
    }

    private function jsonToArrayBeersSearchResponse(string $json): array
    {
        $beers = [];
        $array = json_decode($json);
        if(is_array($array) && !empty($array)) {
            foreach($array as $item) {
                $beers[] = new BeerSearchResponse(
                    (string) $item["id"],
                    (string) $item["name"],
                    (string) $item["description"],
                    (string) $item["image_url"],
                    (string) $item["tagline"],
                    (string) $item["first_brewed"]
                );
            }
        }

        return $beers;
    }


    private function getJsonResponse(string $param) :string
    {
        $client = new Client();
        $response = $client->request('GET', self::URI_API_BEERS . $param);

        return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        //echo $response->getStatusCode(); 200
    }


}