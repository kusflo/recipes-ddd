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

    public static function simpleListToArray(array $array): array
    {
        $out = array();
        if(self::isBeerArray($array)) {
            /**@var Beer $item **/
            foreach($array as $item) {
                $out[] = [
                  'id' => $item->id()->value(),
                  'name' => $item->name()->value(),
                  'description' => $item->description()->value()
                ];
            }
        }

        return $out;

    }

    public static function fullListToArray(array $array): array
    {
        $out = array();
        if(self::isBeerArray($array)) {
            /**@var Beer $item **/
            foreach($array as $item) {
                $out[] = [
                    'id' => $item->id()->value(),
                    'name' => $item->name()->value(),
                    'description' => $item->description()->value(),
                    'image' => $item->image()->value(),
                    'slogan' => $item->slogan()->value(),
                    'dateCreated' => $item->dateCreated()->date()->format('d-m-Y')
                ];
            }
        }

        return $out;

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

    private static function isBeerArray(array $array): bool
    {
        return is_array($array) && !empty($array) && is_a($array[0],self::class);
    }


}