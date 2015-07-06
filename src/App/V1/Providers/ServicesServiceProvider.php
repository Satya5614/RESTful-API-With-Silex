<?php

namespace App\V1\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;
use App\V1\Usecase;
use App\V1\Repositories;

class ServicesServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['v1.task.service'] = $app->share(function () use ($app) {
            $repository = new Repositories\TaskRepository($app['db']);
            return new Usecase\TaskService($repository);
        });
        $app['v1.json_schema.service'] = $app->share(function () use ($app) {
            return new Usecase\JsonSchemaService();
        });
    }

    public function boot(Application $app)
    {
    }
}
