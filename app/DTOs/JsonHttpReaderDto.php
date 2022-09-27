<?php

namespace App\DTOs;

class JsonHttpReaderDto
{
    public function parse(object $jsonData): array
    {
        return array_map(function ($offer) {
            $obj = new \stdClass();

            $obj->offerId = $offer->offer_id;
            $obj->productTitle = $offer->product_title;
            $obj->vendorId = $offer->vendor_id;
            $obj->price = $offer->price;

            return $obj;
        }, $jsonData->offers);
    }
}
