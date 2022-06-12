<?php

namespace App\Console\Commands;

use App\Models\v1\PurchaseRequest;
use Illuminate\Console\Command;

class PurchaseRequestSynchronizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pr:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // @todo refactor dummy synchronize PR into real one.
        $this->info(PurchaseRequest::factory()->count(5)->create()->toJson());
    }
}
