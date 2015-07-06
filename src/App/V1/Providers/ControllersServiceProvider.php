<?php

namespace App\V1\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;
use App\V1\Controllers;

class ControllersServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['v1.task.controller'] = $app->share(function () use ($app) {
            return new Controllers\TaskController($app['v1.task.service']);
        });
        $app['v1.json_schema.controller'] = $app->share(function () use ($app) {
            return new Controllers\JsonSchemaController($app['v1.json_schema.service']);
        });
    }

    public function boot(Application $app)
    {
    }
}
