<?php

namespace App\V1\Entities;

use PHPMentors\DomainKata\Entity\EntityInterface;

class TaskEntity implements EntityInterface
{
    protected $id = null;
    protected $body = null;
    protected $status = 0;
    protected $created_on = null;
    protected $updated_on = null;
    protected $group_id = null;

    public function setProperties($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBody()
    {
        return $this->body;
    }
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCreatedOn()
    {
        return $this->created_on;
    }
    public function setCreatedOn($created_on)
    {
        $this->created_on = $created_on;
    }

    public function getUpdatedOn()
    {
        return $this->updated_on;
    }
    public function setUpdatedOn($updated_on)
    {
        $this->updated_on= $updated_on;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }
    public function setGroupId($group_id)
    {
        $this->group_id=$group_id;
    }
}
