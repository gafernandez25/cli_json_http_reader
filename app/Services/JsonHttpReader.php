<?php

namespace App\Services;

use App\DTOs\JsonHttpReaderDto;
use Illuminate\Support\Facades\Http;

class JsonHttpReader
{
    public function getJsonData(string $jsonPath): object
    {
        $response = Http::get($jsonPath);

        return $response->object();
    }
}
