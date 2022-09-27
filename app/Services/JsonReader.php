<?php

namespace App\Services;

use App\Collections\OfferCollection;
use App\DTOs\JsonHttpReaderDto;
use App\Interfaces\ReaderInterface;
use App\Interfaces\OfferCollectionInterface;

class JsonReader implements ReaderInterface
{
    public function __construct(
        private JsonHttpReader $jsonHttpReader,
        private JsonHttpReaderDto $jsonHttpReaderDto
    ) {
    }

    /**
     * "http://php_limpio/mock_file.json"
     */
    public function read(string $input): OfferCollectionInterface
    {
        return new OfferCollection($this->getOffers($input));
    }

    public function getOffers(string $jsonPath): array
    {
        return $this->jsonHttpReaderDto->parse($this->jsonHttpReader->getJsonData($jsonPath));
    }
}
