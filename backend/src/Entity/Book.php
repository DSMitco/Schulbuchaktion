<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "book_id")]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $bnr = null;

    #[ORM\Column(name: "short_title", length: 255)]
    private ?string $shorttitle = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $listtype = null;

    #[ORM\Column(name: "school_form", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $schoolform = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebook = null;

    #[ORM\Column(name: "ebook_plus", type: Types::BOOLEAN, options: ['default' => false])]
    private ?Boolean $ebookplus = null;

    #[ORM\Column(name: "mainbook_id", type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $mainbookid = null;

    #[ORM\OneToOne(targetEntity: Bookprice::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "book_price_id", referencedColumnName: "book_price_id")]
    private ?Bookprice $bookprice = null;

    #[ORM\ManyToOne(targetEntity: Subject::class, inversedBy: "books")]
    #[ORM\JoinColumn(name: "subject_id", referencedColumnName: "subject_id")]
    private ?Subject $subject = null;

    #[ORM\ManyToOne(targetEntity: Publisher::class, inversedBy: "books")]
    #[ORM\JoinColumn(name: "publisher_id", referencedColumnName: "publisher_id")]
    private ?Publisher $publisher = null;

    #[ORM\OneToMany(targetEntity: BookSchoolGrade::class, mappedBy: "book")]
    private $grades;

    #[ORM\OneToMany(targetEntity: Bookorder::class, mappedBy: "book")]
    private Collection $bookorders;

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

    public function getBookprice(): ?Bookprice
    {
        return $this->bookprice;
    }

    public function setBookprice(?Bookprice $bookprice): self
    {
        $this->bookprice = $bookprice;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }


    public function __construct()
    {
        $this->bookorders = new ArrayCollection();
        $this->grades = new ArrayCollection();
    }


    public function getBookorders(): Collection
    {
        return $this->bookorders;
    }

    public function addBookorder(Bookorder $bookorder): self
    {
        if (!$this->bookorders->contains($bookorder)) {
            $this->bookorders[] = $bookorder;
            $bookorder->setBook($this);
        }

        return $this;
    }

    public function removeBookorder(Bookorder $bookorder): self
    {
        if ($this->bookorders->removeElement($bookorder)) {
            if ($bookorder->getBook() === $this) {
                $bookorder->setBook(null);
            }
        }

        return $this;
    }

    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(Schoolgrade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades[] = $grade;
            $grade->addBook($this);
        }

        return $this;
    }

    public function removeGrade(Schoolgrade $grade): self
    {
        if ($this->grades->removeElement($grade)) {
            $grade->removeBook($this);
        }

        return $this;
    }

}
