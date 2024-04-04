<?php

namespace App\Entity;

use App\Repository\SchoolclassRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolclassRepository::class)]
class Schoolclass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "schoolclass_id")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $grade = null;

    #[ORM\Column(name: "students_amount", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $studentsamount = null;

    #[ORM\Column(name: "rep_amount", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $repamount = null;

    #[ORM\Column(name: "used_budget", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $usedbudget = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $budget = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $year = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $profile = null;

    #[ORM\ManyToOne(targetEntity: Department::class, inversedBy: "schoolclasses")]
    #[ORM\JoinColumn(name: "department_id", referencedColumnName: "department_id", nullable: false)]
    private ?Department $department = null;

    #[ORM\OneToMany(targetEntity: Bookorder::class, mappedBy: "schoolclass")]
    private Collection $bookorders;

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

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getStudentsamount(): ?string
    {
        return $this->studentsamount;
    }

    public function setStudentsamount(string $studentsamount): static
    {
        $this->studentsamount = $studentsamount;

        return $this;
    }

    public function getRepamount(): ?string
    {
        return $this->repamount;
    }

    public function setRepamount(string $repamount): static
    {
        $this->repamount = $repamount;

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

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function __construct()
    {
        $this->bookorders = new ArrayCollection();
    }

    public function getBookorders(): Collection
    {
        return $this->bookorders;
    }

    public function addBookorder(Bookorder $bookorder): self
    {
        if (!$this->bookorders->contains($bookorder)) {
            $this->bookorders[] = $bookorder;
            $bookorder->setSchoolclass($this);
        }

        return $this;
    }

    public function removeBookorder(Bookorder $bookorder): self
    {
        if ($this->bookorders->removeElement($bookorder)) {
            if ($bookorder->getSchoolclass() === $this) {
                $bookorder->setSchoolclass(null);
            }
        }

        return $this;
    }
}
