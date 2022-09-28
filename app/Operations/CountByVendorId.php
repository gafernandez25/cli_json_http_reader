<?php

namespace App\Operations;

use App\Interfaces\CountOperationInterface;
use App\Interfaces\OfferCollectionInterface;

class CountByVendorId implements CountOperationInterface
{
    private int $vendorId;

    public function setParams(array $params): self
    {
        $this->vendorId = $params[0];

        return $this;
    }

    public function result(OfferCollectionInterface $offerCollection): int
    {
        $count = 0;

        foreach ($offerCollection->getIterator() as $offer) {
            if ($offer->getVendorId() == $this->vendorId) {
                $count++;
            }
        }

        return $count;
    }
}
