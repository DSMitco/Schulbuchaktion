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
    #[ORM\Column(name: "book_order_id")]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $count = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $teacherCopy = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebook = null;

    #[ORM\Column(name: "ebook_plus", type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebookplus = null;

    #[ORM\ManyToOne(targetEntity: Schoolclass::class, inversedBy: "bookorders")]
    #[ORM\JoinColumn(name: "schoolclass_id", referencedColumnName: "schoolclass_id", nullable: false)]
    private ?Schoolclass $schoolclass = null;

    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: "bookorders")]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "id", nullable: false)]
    private ?Book $book = null;

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

    public function getSchoolclass(): ?Schoolclass
    {
        return $this->schoolclass;
    }

    public function setSchoolclass(?Schoolclass $schoolclass): void
    {
        $this->schoolclass = $schoolclass;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): void
    {
        $this->book = $book;
    }



}
