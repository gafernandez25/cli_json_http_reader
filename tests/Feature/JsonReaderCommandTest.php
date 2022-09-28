<?php

namespace Tests\Feature;

use App\Exceptions\MissingSomeParamException;
use App\Exceptions\OperationNotFoundException;
use App\Services\JsonHttpReader;
use Exception;
use Tests\TestCase;

class JsonReaderCommandTest extends TestCase
{
    public function testArtisanCommandWithoutNameNorParam()
    {
        $this->expectException(Exception::class);
        $this->artisan("get:number");
    }

    public function testArtisanCommandWithoutAnyParam()
    {
        $this->expectException(Exception::class);
        $this->artisan("get:number count_by_price_range");
    }

    public function testArtisanCommandWithNonExistingOperation()
    {
        $this->expectException(OperationNotFoundException::class);
        $this->artisan("get:number count_by_price 10 20");
    }

    public function testArtisanCommandWithFewParams()
    {
        $this->expectException(MissingSomeParamException::class);
        $this->artisan("get:number count_by_price_range 10");
    }

    public function testCountByPriceRangeOperation()
    {
        $this->artisan("get:number count_by_price_range 10 20")
            ->expectsOutput("1")
            ->assertExitCode(0);
    }

    public function testCountByVendorOperation()
    {
        $this->artisan("get:number count_by_vendor_id 35")
            ->expectsOutput("2")
            ->assertExitCode(0);
    }
}
