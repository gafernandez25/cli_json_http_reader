<?php

namespace App\Interfaces;

interface CountOperationInterface
{
    public function setParams(array $params): self;

    public function result(OfferCollectionInterface $offerCollection): int;
}
