<?php


namespace App\Beers\Domain;


use DateTimeImmutable;

class BeerDateCreated
{
    private DateTimeImmutable $date;

    public function __construct(DateTimeImmutable $date)
    {
        $this->date = $date;
    }

    public function date(): DateTimeImmutable
    {
        return $this->date;
    }

}