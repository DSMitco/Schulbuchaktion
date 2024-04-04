<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "subject_id")]
    private ?int $id = null;

    #[ORM\Column(name: "short_name", length: 255)]
    private ?string $shortname = null;

    #[ORM\Column(name: "full_name", length: 255)]
    private ?string $fullname = null;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "head_of_subject_id", referencedColumnName: "user_id", nullable: false)]
    private ?User $headofsubjectid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortname(): ?string
    {
        return $this->shortname;
    }

    public function setShortname(string $shortname): static
    {
        $this->shortname = $shortname;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getHeadofsubjectid(): ?User
    {
        return $this->headofsubjectid;
    }

    public function setHeadofsubjectid(User $headofsubjectid): static
    {
        $this->headofsubjectid = $headofsubjectid;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->headofsubjectid;
    }

    public function setUser(User $user): static
    {
        $this->headofsubjectid = $user;

        return $this;
    }

}
