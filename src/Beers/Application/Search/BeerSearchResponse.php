<?php


namespace App\Beers\Application\Search;


class BeerSearchResponse
{

    private string $id;
    private string $name;
    private string $description;
    private ?string $img;
    private ?string $slogan;
    private ?string $dateCreated;

    public function __construct(string $id, string $name, string $description,
                                ?string $img, ?string $slogan, ?string $dateCreated)
    {

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->slogan = $slogan;
        $this->dateCreated = $dateCreated;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function img(): ?string
    {
        return $this->img;
    }

    public function slogan(): ?string
    {
        return $this->slogan;
    }

    public function dateCreated(): ?string
    {
        return $this->dateCreated;
    }

}