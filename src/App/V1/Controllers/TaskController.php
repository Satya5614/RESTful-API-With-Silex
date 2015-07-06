<?php

namespace App\V1\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\V1\Usecase\TaskService;

class TaskController
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function getTasks()
    {
        $json_array = $this->service->getTasks();
        return $this->generateJsonResponse($json_array);
    }

    public function getTask(Request $request, $id)
    {
        $json_array = $this->service->getTask($id);
        return $this->generateJsonResponse($json_array);
    }

    public function createTask(Request $request)
    {
        $json_array = $this->service->createTask($request->request->all());
        $json_array = "Task with Id ".$json_array." successfully created.";
        return $this->generateJsonResponse($json_array, 201);
    }

    public function updateTask($id, Request $request)
    {
        $taskData = array();
        if ($request->get('body')) {
            $taskData['body'] = $request->get('body');
        }
        if ($request->get('group_id')) {
            $taskData['group_id'] = $request->get('group_id');
        }
        if ($request->get('status')) {
            $taskData['status'] = $request->get('status');
        }
        $json_array = "Task with Id ".$this->service->updateTask($id, $taskData)." updated.";
        return $this->generateJsonResponse($json_array, 303);
    }

    public function deleteTask($id)
    {
        $json_array = "Task with Id ".$this->service->deleteTask($id)." deleted.";
        return $this->generateJsonResponse($json_array, 303);
    }

    private function generateJsonResponse($json_array, $status_code = 200, Array $headers = array())
    {
        if (0 === count($headers)) {
            $headers = array('Cache-Control' => 's-maxage=10, public');
        }
        if (null === $json_array) {
            $json_array = array('message' => 'Task Not Found.');
            $status_code = 404;
            $headers = array('Cache-Control' => 's-maxage=10, public');
        }
        return new JsonResponse(
            $json_array,
            $status_code,
            $headers
        );
    }
}
