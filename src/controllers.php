<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\V1\Usecase\TaskService;

//Request::setTrustedProxies(array('127.0.0.1'));

$api = $app['controllers_factory'];

$api->get('/tasks', 'v1.task.controller:getTasks');

$api->post('/tasks', 'v1.task.controller:createTask');

$api->get('/tasks/{id}', 'v1.task.controller:getTask');

$api->put('/tasks/{id}', 'v1.task.controller:updateTask');

$api->delete('/tasks/{id}', 'v1.task.controller:deleteTask');

$api->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});

$app->mount('/api/V1', $api);
