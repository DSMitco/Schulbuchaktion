<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $budget = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $usedbudget = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $umew = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $headofdepartmentid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getUsedbudget(): ?string
    {
        return $this->usedbudget;
    }

    public function setUsedbudget(string $usedbudget): static
    {
        $this->usedbudget = $usedbudget;

        return $this;
    }

    public function getUmew(): ?string
    {
        return $this->umew;
    }

    public function setUmew(string $umew): static
    {
        $this->umew = $umew;

        return $this;
    }

    public function getHeadofdepartmentid(): ?string
    {
        return $this->headofdepartmentid;
    }

    public function setHeadofdepartmentid(string $headofdepartmentid): static
    {
        $this->headofdepartmentid = $headofdepartmentid;

        return $this;
    }
}
