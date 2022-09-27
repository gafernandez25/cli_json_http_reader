<?php

namespace Tests\Feature;

use App\DTOs\JsonHttpReaderDto;
use App\Services\JsonHttpReader;
use App\Services\JsonReader;
use Tests\TestCase;

class JsonReaderTest extends TestCase
{
    public function testRead()
    {
        $mockJsonHttpReader = $this->createMock(JsonHttpReader::class);

        $jsonData = '{
                        "offers": [
                            {
                                "offer_id": 123,
                                "product_title": "Coffee machine",
                                "vendor_id": 35,
                                "price": 390.4
                            },
                            {
                                "offer_id": 124,
                                "product_title": "Napkins",
                                "vendor_id": 35,
                                "price": 15.5
                            },
                            {
                                "offer_id": 125,
                                "product_title": "Chair",
                                "vendor_id": 84,
                                "price": 230.0
                            }
                        ]
                    }';

        $mockJsonHttpReader->method("getJsonData")->willReturn(json_decode($jsonData));

        $offerCollection = (new JsonReader($mockJsonHttpReader, new JsonHttpReaderDto()))->read("fake/path");

        $this->assertEquals(123, $offerCollection->get(0)->getOfferId());
        $this->assertEquals(124, $offerCollection->get(1)->getOfferId());
        $this->assertEquals("Coffee machine", $offerCollection->get(0)->getProductTitle());
        $this->assertEquals(35, $offerCollection->get(0)->getVendorId());
        $this->assertEquals(390.4, $offerCollection->get(0)->getPrice());
    }

}
