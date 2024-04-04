<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "department_id")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $budget = null;

    #[ORM\Column(name: "used_budget", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $usedbudget = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $umew = null;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "head_of_department", referencedColumnName: "user_id", nullable: false)]
    private ?User $headofdepartment = null;

    // This will not be a column in the database
    #[ORM\OneToMany(targetEntity: Schoolclass::class, mappedBy: "department")]
    private Collection $schoolclasses;

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

    public function getHeadofdepartment(): ?User
    {
        return $this->headofdepartment;
    }

    public function setHeadofdepartment(User $headofdepartment): static
    {
        $this->headofdepartment = $headofdepartment;

        return $this;
    }

    public function __construct()
    {
        $this->schoolclasses = new ArrayCollection();
    }

    public function getSchoolclasses(): Collection
    {
        return $this->schoolclasses;
    }

    public function addSchoolclass(Schoolclass $schoolclass): self
    {
        if (!$this->schoolclasses->contains($schoolclass)) {
            $this->schoolclasses[] = $schoolclass;
            $schoolclass->setDepartment($this);
        }

        return $this;
    }

    public function removeSchoolclass(Schoolclass $schoolclass): self
    {
        if ($this->schoolclasses->removeElement($schoolclass)) {
            // set the owning side to null (unless already changed)
            if ($schoolclass->getDepartment() === $this) {
                $schoolclass->setDepartment(null);
            }
        }

        return $this;
    }
}
