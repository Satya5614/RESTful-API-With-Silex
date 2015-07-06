<?php
namespace App\V1\Repositories;

use PHPMentors\DomainKata\Repository\RepositoryInterface;
use PHPMentors\DomainKata\Entity\EntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\V1\Entities\GroupEntity;
use Doctrine\DBAL\Connection;

class GroupRepository implements RepositoryInterface
{
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    //public function findAll(CriteriaInterface $Criteria,Array $order_by= array())
    public function findAll($orderBy = array(), Array $groups = array())
    {
        if (!$orderBy) {
            $orderBy = array('id' => 'ASC');
        }
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('groups', 'a')
            //SQL injection generate colum name lists and check it.
            ->orderBy('a.' . key($orderBy), current($orderBy));
        $statement = $queryBuilder->execute();
        $groupsData = $statement->fetchAll();

        foreach ($groupsData as $groupData) {
            $groupId = $groupData['id'];
            $groups[$groupId] = $this->buildGroupEntity($groupData);
        }
        return $groups;
    }

    public function buildGroupEntity(Array $paramaters = array())
    {
        $entity = new GroupEntity;
        $entity->setProperties($paramaters);
        return $entity;
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
