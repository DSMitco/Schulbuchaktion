<?php

namespace App\Entity;

use App\Repository\BookpriceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookpriceRepository::class)]
class Bookprice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "book_price_id")]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $year = null;

    #[ORM\Column(name: "price_inclusive_ebook", type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $priceinclusiveebook = null;

    #[ORM\Column(name: "price_ebook", type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $priceebook = null;

    #[ORM\Column(name: "ebook_plus_price", type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $ebookplusprice = null;

    #[ORM\OneToOne(targetEntity: Book::class, mappedBy: "bookprice", cascade: ["persist", "remove"])]
    private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPriceinclusiveebook(): ?string
    {
        return $this->priceinclusiveebook;
    }

    public function setPriceinclusiveebook(string $priceinclusiveebook): static
    {
        $this->priceinclusiveebook = $priceinclusiveebook;

        return $this;
    }

    public function getPriceebook(): ?string
    {
        return $this->priceebook;
    }

    public function setPriceebook(string $priceebook): static
    {
        $this->priceebook = $priceebook;

        return $this;
    }

    public function getEbookplusprice(): ?string
    {
        return $this->ebookplusprice;
    }

    public function setEbookplusprice(?string $ebookplusprice): static
    {
        $this->ebookplusprice = $ebookplusprice;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
