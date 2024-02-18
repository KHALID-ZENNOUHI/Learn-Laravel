<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Route as RouteModel;
use App\Models\Role;
use App\Models\Permission;
class Permession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permession';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all the routes to the table routes in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        # Truncate tables :
        $routes = RouteModel::all();
        foreach ($routes as $route) $route->delete();
        $permessions = Permission::all();
        foreach ($permessions as $permession) $permession->delete();

        # Get all the Routes :
        $routes = Route::getRoutes();
        $routesSaved = [];

        # Add the Routes to Routes table :
        foreach ($routes as $route) {

            $uri = $route->uri();

            # remove laravel default routes :
            if (strstr($uri, '_')) continue;
            if (strstr($uri, 'api')) continue;
            if (strstr($uri, 'csrf')) continue;

            # check for Duplicate :
            if (in_array($uri, $routesSaved)) continue;

            RouteModel::create([
                'name' => $uri
            ]);
            $routesSaved[] = $uri;
        }

        
    }
}
