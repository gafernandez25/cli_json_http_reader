<?php

namespace App\Operations;

use App\Interfaces\CountOperationInterface;
use App\Interfaces\OfferCollectionInterface;

class CountByVendorId implements CountOperationInterface
{
    public function __construct(array $params)
    {
    }

    public function result(OfferCollectionInterface $offerCollection): int
    {
        return 1;
    }
}
