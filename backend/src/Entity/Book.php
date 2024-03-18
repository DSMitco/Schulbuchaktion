<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $bnr = null;

    #[ORM\Column(length: 255)]
    private ?string $shorttitle = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $listtype = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $schoolform = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebook = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebookplus = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $mainbookid = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $bookpriceid = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $subjectid = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $publisherid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBnr(): ?string
    {
        return $this->bnr;
    }

    public function setBnr(string $bnr): static
    {
        $this->bnr = $bnr;

        return $this;
    }

    public function getShorttitle(): ?string
    {
        return $this->shorttitle;
    }

    public function setShorttitle(string $shorttitle): static
    {
        $this->shorttitle = $shorttitle;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getListtype(): ?string
    {
        return $this->listtype;
    }

    public function setListtype(?string $listtype): static
    {
        $this->listtype = $listtype;

        return $this;
    }

    public function getSchoolform(): ?string
    {
        return $this->schoolform;
    }

    public function setSchoolform(string $schoolform): static
    {
        $this->schoolform = $schoolform;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): static
    {
        $this->info = $info;

        return $this;
    }

    public function getEbook(): ?string
    {
        return $this->ebook;
    }

    public function setEbook(string $ebook): static
    {
        $this->ebook = $ebook;

        return $this;
    }

    public function getEbookplus(): ?string
    {
        return $this->ebookplus;
    }

    public function setEbookplus(string $ebookplus): static
    {
        $this->ebookplus = $ebookplus;

        return $this;
    }

    public function getMainbookid(): ?string
    {
        return $this->mainbookid;
    }

    public function setMainbookid(?string $mainbookid): static
    {
        $this->mainbookid = $mainbookid;

        return $this;
    }

    public function getBookpriceid(): ?string
    {
        return $this->bookpriceid;
    }

    public function setBookpriceid(string $bookpriceid): static
    {
        $this->bookpriceid = $bookpriceid;

        return $this;
    }

    public function getSubjectid(): ?string
    {
        return $this->subjectid;
    }

    public function setSubjectid(string $subjectid): static
    {
        $this->subjectid = $subjectid;

        return $this;
    }

    public function getPublisherid(): ?string
    {
        return $this->publisherid;
    }

    public function setPublisherid(string $publisherid): static
    {
        $this->publisherid = $publisherid;

        return $this;
    }
}
