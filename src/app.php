<?php

use Silex\Application;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use App\V1\Providers\ControllersServiceProvider;
use App\V1\Providers\ServicesServiceProvider;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ServiceControllerServiceProvider());

$app->register(new ControllersServiceProvider(), array(
));
$app->register(new ServicesServiceProvider(), array(
));

$db_options = array(
    'driver' => 'pdo_mysql',
    'dbname' => DATABASE_NAME,
    'host' => HOSTNAME,
    'user' => USERNAME,
    'password' => PASSWORD,
    'charset' => 'utf8'
);

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => $db_options
));

return $app;