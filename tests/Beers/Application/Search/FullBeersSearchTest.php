<?php


namespace App\Tests\Beers\Application\Search;

use App\Beers\Application\Search\FullBeers;
use App\Beers\Domain\Beer;
use App\Beers\Domain\BeerDateCreated;
use App\Beers\Domain\FoodString;
use App\Tests\Beers\Infrastructure\BeersRepositoryMother;
use PHPUnit\Framework\TestCase;

class FullBeersSearchTest extends TestCase
{

    private $repository;

    public function setUp(): void
    {
        $this->repository = new BeersRepositoryMother();
        parent::setUp();

    }

    /** @test */
    public function it_should_find_a_valid_full_beers_list(): void
    {

        $searchString = "Tomato salad";
        $foodString = new FoodString($searchString);
        $fullBeersSearch = new FullBeers($this->repository);
        $beers = $fullBeersSearch->__invoke($foodString);
        /**@var Beer $beer */
        $beer = $beers[0];
        $this->assertInstanceOf(Beer::class, $beer);
        $this->assertInstanceOf(BeerDateCreated::class, $beer->dateCreated());
    }




}