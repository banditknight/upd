<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

class FormRequestGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:form-request:generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate form request based on pattern.';

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
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            if (!isset($route['action']['model'])) {
                continue;
            }

            $model = $route['action']['model'];
            $method = $route['action']['method'];

            $modelInstance = new $model();
            $formRequestNameSpace = class_basename($modelInstance);

            if (
                method_exists($modelInstance, 'getRules') &&
                $modelInstance->getRules()
            ) {
                $this->info('Skip generating form request.');
                continue;
            }

            $formRequestNameSpace = sprintf('%s/%s/%sRequest', 'v1', $formRequestNameSpace, ucfirst($method));

            $this->info(sprintf('Generating form request with name %s', $formRequestNameSpace));
            Artisan::call('make:request', ['name' => $formRequestNameSpace]);
        }
    }
}
