<?php

namespace App\V1\Entities;

use PHPMentors\DomainKata\Entity\EntityInterface;

class GroupEntity implements EntityInterface
{
    protected $id = null;
    protected $name = null;

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
    public function getName()
    {
        return $this->name;
    }
}
