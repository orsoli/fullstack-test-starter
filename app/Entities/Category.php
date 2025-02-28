<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'categories')]
class Category
{
    #[Id]
    #[Column(type: 'bigint', options: ['unsigned' => true, 'primary'=>true])]
    #[GeneratedValue]
    private $id;

    #[Column(type: 'string', length: 255, nullable: false, unique: true)]
    private $name;

    #[Column(name: '__typename', type: 'string', length: 255)]
    private $typeName;

    #[Column(type: 'datetime', name: 'created_at', options: ['default' => 'CURRENT_TIMESTAMP', 'onUpdate' => 'CURRENT_TIMESTAMP'])]
    private $createdAt;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
}