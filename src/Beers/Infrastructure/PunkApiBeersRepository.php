<?php

namespace App\Beers\Infrastructure;

use App\Beers\Application\Search\BeerSearchResponse;
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
                    (string) $item->id,
                    (string) $item->name,
                    (string) $item->description,
                    (string) $item->image_url,
                    (string) $item->tagline,
                    $this->formatDate($item->first_brewed)
                );
            }
        }

        return $beers;
    }


    private function getJsonResponse(string $param) :string
    {
        $client = new Client();
        $uri = self::URI_API_BEERS . $param;
        $response = $client->request('GET', $uri);

        return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        //echo $response->getStatusCode(); 200
    }

    private function formatDate($param): string
    {
        $monthYear = explode('/', $param);
        //TODO La Api no devuelve el día y a veces tampoco mes.
        if(count($monthYear) > 1){
            $date = $monthYear[1] . '-' . $monthYear[0] . '-01';
        } else {
            $date = $monthYear[0] . '-' .  '01-01';
        }

         return $date;
    }


}