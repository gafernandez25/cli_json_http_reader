<?php

namespace App\Console\Commands;

use App\Operations\AvailableOperations;
use App\Services\JsonReader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GetCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:number {action} {params?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reads json and applies action received as param with parameters received if needed';

    public function __construct(private JsonReader $jsonReader)
    {
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

        $result = $operation
            ->setParams($this->argument('params'))
            ->result($offerCollection);

        $this->info($result);

        return 0;
    }
}
