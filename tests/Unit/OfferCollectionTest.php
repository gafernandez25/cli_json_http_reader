<?php

namespace Tests\Unit;

use App\Collections\OfferCollection;
use PHPUnit\Framework\TestCase;

class OfferCollectionTest extends TestCase
{

    public function testGet()
    {
        $obj1 = new \stdClass();
        $obj1->productTitle = "fake title 1";
        $obj1->offerId = 1;
        $obj1->vendorId = 1;
        $obj1->price = 10.5;

        $obj2 = new \stdClass();
        $obj2->productTitle = "fake title 2";
        $obj2->offerId = 2;
        $obj2->vendorId = 1;
        $obj2->price = 20.3;

        $offerCollection = new OfferCollection([$obj1, $obj2]);

        $this->assertEquals(2, $offerCollection->get(1)->getOfferId());
        $this->assertEquals(10.5, $offerCollection->get(0)->getPrice());
    }

    public function testGetThrowsException()
    {
        $this->expectException(\Exception::class);
        $this->expectErrorMessage("Offer does not exist");

        $obj1 = new \stdClass();
        $obj1->productTitle = "fake title 1";
        $obj1->offerId = 1;
        $obj1->vendorId = 1;
        $obj1->price = 10.5;

        $obj2 = new \stdClass();
        $obj2->productTitle = "fake title 2";
        $obj2->offerId = 2;
        $obj2->vendorId = 1;
        $obj2->price = 20.3;

        $offerCollection = new OfferCollection([$obj1, $obj2]);

        $this->assertEquals(2, $offerCollection->get(2)->getOfferId());
    }
}
