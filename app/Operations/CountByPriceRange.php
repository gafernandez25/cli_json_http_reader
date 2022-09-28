<?php

namespace App\Operations;

use App\Exceptions\MissingSomeParamException;
use App\Interfaces\CountOperationInterface;
use App\Interfaces\OfferCollectionInterface;

class CountByPriceRange implements CountOperationInterface
{
    private int $minRange;
    private int $maxRange;

    public function setParams(array $params): self
    {
        if (count($params) < 2) {
            throw new MissingSomeParamException();
        }
        $this->minRange = $params[0];
        $this->maxRange = $params[1];

        return $this;
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
