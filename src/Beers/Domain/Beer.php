<?php


namespace App\Beers\Domain;


class Beer
{

    private BeerID $id;
    private BeerName $name;
    private BeerDescription $description;
    private ?BeerImage $image;
    private ?BeerSlogan $slogan;
    private ?BeerDateCreated $dateCreated;

    public function __construct(BeerID $id, BeerName $name, BeerDescription $description,
                                ?BeerImage $image, ?BeerSlogan $slogan, ?BeerDateCreated $dateCreated)
    {

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->slogan = $slogan;
        $this->dateCreated = $dateCreated;
    }

    public function id(): BeerID
    {
        return $this->id;
    }

    public function name(): BeerName
    {
        return $this->name;
    }

    public function description(): BeerDescription
    {
        return $this->description;
    }

    public function image(): ?BeerImage
    {
        return $this->image;
    }

    public function slogan(): ?BeerSlogan
    {
        return $this->slogan;
    }

    public function dateCreated(): ?BeerDateCreated
    {
        return $this->dateCreated;
    }

}