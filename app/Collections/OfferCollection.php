<?php

namespace App\Collections;

use App\Entities\Offer;
use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use Iterator;

class OfferCollection implements OfferCollectionInterface
{

    private array $collection;

    public function __construct(array $offers)
    {
        foreach ($offers as $offer) {
            $this->collection[] = new Offer(
                $offer->productTitle,
                (int)$offer->offerId,
                (int)$offer->vendorId,
                (float)$offer->price
            );
        }
    }

    public function get(int $index): OfferInterface
    {
        if (!isset($this->collection[$index])) {
            throw new \Exception("Offer does not exist");
        }

        return $this->collection[$index];
    }

    public function getIterator(): Iterator
    {
        return new \ArrayIterator($this->collection);
    }
}
