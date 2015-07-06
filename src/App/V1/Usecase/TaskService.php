<?php

namespace App\V1\Usecase;

use App\V1\Repositories\TaskRepository;

class TaskService
{
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTasks()
    {
        $entities = $this->repository->findAll();
        $tasks = array();
        foreach ($entities as $taskId => $entity) {
            $task = array(
                'id' => $taskId,
                'body' => $entity->getBody(),
                'status' => $entity->getStatus(),
                'group_id' => $entity->getGroupId(),
                'updated_on' => $entity->getUpdatedOn(),
                'created_on' => $entity->getCreatedOn(),
            );
            array_push($tasks, $task);
        }
        return $tasks;
    }
    public function getTask($id)
    {
        $entity = $this->repository->find($id);
        return $task = array(
            'id' => $id,
            'body' => $entity->getBody(),
            'status' => $entity->getStatus(),
            'group_id' => $entity->getGroupId(),
            'updated_on' => $entity->getUpdatedOn(),
            'created_on' => $entity->getCreatedOn(),
        );
    }
    public function createTask($request)
    {
        $entity = $this->repository->buildTaskEntity($request);
        $this->repository->save($entity);
        return $entity->getId();
        //new Response("User " . $entity->getId(); . "created", 201);
    }

    public function updateTask($id, $taskData)
    {
        $entity = $this->repository->find($id);
        if ($taskData['body']) {
            $entity->setBody($taskData['body']);
        }
        if ($taskData['group_id']) {
            $entity->setGroupId($taskData['group_id']);
        }
        if ($taskData['status']!=null) {
            $entity->setStatus($taskData['status']);
        }
        $this->repository->save($entity);
        return $entity->getId();
    }

    public function deleteTask($id)
    {
        $entity = $this->repository->find($id);
        $this->repository->delete($entity);
        return $id;
    }
}
