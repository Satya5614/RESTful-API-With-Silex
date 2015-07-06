<?php
namespace App\V1\Repositories;

use PHPMentors\DomainKata\Repository\RepositoryInterface;
use PHPMentors\DomainKata\Entity\EntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\V1\Entities\TaskEntity;
use Doctrine\DBAL\Connection;

class TaskRepository implements RepositoryInterface
{
    protected $db;
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function buildTaskEntity(Array $paramaters = array())
    {
        $entity = new TaskEntity;
        $entity->setProperties($paramaters);
        return $entity;
    }

    public function findAll($orderBy = array(), Array $tasks = array())
    {
        if (!$orderBy) {
            $orderBy = array('id' => 'ASC');
        }
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('tasks', 'a')
            ->orderBy('a.' . key($orderBy), current($orderBy));
        $statement = $queryBuilder->execute();
        $tasksData = $statement->fetchAll();

        foreach ($tasksData as $taskData) {
            $taskId = $taskData['id'];
            $tasks[$taskId] = $this->buildTaskEntity($taskData);
        }
        return $tasks;
    }

    public function find($id)
    {
        $taskData = $this->db->fetchAssoc('SELECT * FROM tasks WHERE id = ?', array($id));
        return $taskData ? $this->buildTaskEntity($taskData) : false;
    }

    public function save(EntityInterface $task)
    {
        $taskData = array(
            'body' => $task->getBody(),
            'group_id' => $task->getGroupId(),
            'status' =>  $task->getStatus(),
        );
        if ($task->getId()) {
            $taskData['updated_on'] = date("Y-m-d H:i:s", time());
            $this->db->update('tasks', $taskData, array('id' => $task->getId()));
        } else {
            $taskData['updated_on'] = date("Y-m-d H:i:s", time());
            $taskData['created_on'] = date("Y-m-d H:i:s", time());
            $this->db->insert('tasks', $taskData);
            $id = $this->db->lastInsertId();
            $task->setId($id);
        }
        return null;
    }

    public function delete($task)
    {
        return $this->db->delete('tasks', array('id' => $task->getId()));
    }

    public function add(EntityInterface $entity)
    {
        return null;
    }

    public function remove(EntityInterface $entity)
    {
        return null;
    }
}
