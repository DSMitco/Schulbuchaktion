<?php

namespace App\Entity;

use App\Repository\BookorderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: BookorderRepository::class)]
class Bookorder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $count = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $teacherCopy = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebook = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebookplus = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $schoolclassid = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $bookid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCount(): ?string
    {
        return $this->count;
    }

    public function setCount(string $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function getTeacherCopy(): ?string
    {
        return $this->teacherCopy;
    }

    public function setTeacherCopy(string $teacherCopy): static
    {
        $this->teacherCopy = $teacherCopy;

        return $this;
    }

    public function getSchoolclassid(): ?string
    {
        return $this->schoolclassid;
    }

    public function setSchoolclassid(string $schoolclassid): static
    {
        $this->schoolclassid = $schoolclassid;

        return $this;
    }

    public function getBookid(): ?string
    {
        return $this->bookid;
    }

    public function setBookid(string $bookid): static
    {
        $this->bookid = $bookid;

        return $this;
    }

    public function getEbook(): ?bool
    {
        return $this->ebook;
    }

    public function setEbook(?bool $ebook): void
    {
        $this->ebook = $ebook;
    }

    public function getEbookplus(): ?bool
    {
        return $this->ebookplus;
    }

    public function setEbookplus(?bool $ebookplus): void
    {
        $this->ebookplus = $ebookplus;
    }

}
