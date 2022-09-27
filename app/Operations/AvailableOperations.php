<?php

namespace App\Operations;

use App\Interfaces\CountOperationInterface;

class AvailableOperations
{
    private array $operations;

    public function __construct(private array $params)
    {
        $this->operations = [
            "count_by_price_range" => new CountByPriceRange(),
            "count_by_vendor_id" => new CountByVendorId()
        ];
    }

    public function getOperationInstance(string $name): CountOperationInterface
    {
        return $this->operations[$name]->setParams($this->params);
    }
}
