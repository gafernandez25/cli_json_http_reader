<?php

namespace App\Operations;

use App\Interfaces\CountOperationInterface;

class AvailableOperations
{
    private array $operations;

    public function __construct(array $params)
    {
        $this->operations = [
            "count_by_price_range" => new CountByPriceRange($params),
            "count_by_vendor_id" => new CountByVendorId($params)
        ];
    }

    public function getOperationInstance(string $name): CountOperationInterface
    {
        return $this->operations[$name];
    }
}
