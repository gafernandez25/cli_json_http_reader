<?php

namespace App\Entities;

use App\Interfaces\OfferInterface;

class Offer implements OfferInterface
{
    public function __construct(
        private string $productTitle,
        private int $offerId,
        private int $vendorId,
        private float $price
    ) {
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function getOfferId(): int
    {
        return $this->offerId;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

}
