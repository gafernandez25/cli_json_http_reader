<?php

namespace App\Interfaces;

interface CountOperationInterface
{
    public function result(OfferCollectionInterface $offerCollection): int;
}
