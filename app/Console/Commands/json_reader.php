<?php

namespace App\Console\Commands;

use App\DTOs\JsonHttpReaderDto;
use App\Operations\AvailableOperations;
use App\Services\JsonHttpReader;
use App\Services\JsonReader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class json_reader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:json-reader {action} {params?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reads json and applies action received as param with parameters received if needed';

    private array $operationClasses;

    public function __construct(
        private JsonReader $jsonReader,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $offerCollection = $this->jsonReader->read(Config::get("reader.json_file_path"));

        $operation = (new AvailableOperations())->getOperationInstance($this->argument('action'));

        print $operation
                ->setParams($this->argument('params'))
                ->result($offerCollection)
            . PHP_EOL;
    }
}
