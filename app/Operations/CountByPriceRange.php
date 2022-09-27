<?php

namespace App\Operations;

use App\Interfaces\CountOperationInterface;
use App\Interfaces\OfferCollectionInterface;

class CountByPriceRange implements CountOperationInterface
{
    private int $minRange;
    private int $maxRange;

    public function __construct($params)
    {
        $this->minRange = $params[0];
        $this->maxRange = $params[1];
    }

    public function result(OfferCollectionInterface $offerCollection): int
    {
        $count = 0;

        foreach ($offerCollection->getIterator() as $offer) {
            if ($offer->getPrice() >= $this->minRange && $offer->getPrice() <= $this->maxRange) {
                $count++;
            }
        }
        return $count;
    }
}