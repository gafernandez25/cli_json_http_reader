<?php

namespace App\Operations;

use App\Exceptions\OperationNotFoundException;
use App\Interfaces\CountOperationInterface;

class AvailableOperations
{
    private array $operations;

    public function __construct()
    {
        $this->operations = [
            "count_by_price_range" => new CountByPriceRange(),
            "count_by_vendor_id" => new CountByVendorId()
        ];
    }

    public function getOperationInstance(string $name): CountOperationInterface
    {
        if(!isset($this->operations[$name])){
            throw new OperationNotFoundException();
        }
        return $this->operations[$name];
    }
}
