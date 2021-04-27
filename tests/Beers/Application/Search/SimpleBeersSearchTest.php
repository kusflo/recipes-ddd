<?php


namespace App\Tests\Beers\Application\Search;


use App\Beers\Application\Search\SimpleBeers;
use App\Beers\Domain\Beer;
use App\Beers\Domain\FoodString;
use App\Tests\Beers\Infrastructure\BeersRepositoryMother;
use PHPUnit\Framework\TestCase;

class SimpleBeersSearchTest extends TestCase
{

    private $repository;

    public function setUp(): void
    {
        $this->repository = new BeersRepositoryMother();
        parent::setUp();

    }

    /** @test */
    public function it_should_find_a_valid_simple_beers_list(): void
    {

        $searchString = "Tomato salad";
        $foodString = new FoodString($searchString);
        $simpleBeersSearch = new SimpleBeers($this->repository);
        $beers = $simpleBeersSearch->__invoke($foodString);
        $this->assertInstanceOf(Beer::class, $beers[0]);

    }




}