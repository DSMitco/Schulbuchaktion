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
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $year = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $priceinclusiveebook = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $priceebook = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $ebookplusprice = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $bookid = null;

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

    public function getBookid(): ?string
    {
        return $this->bookid;
    }

    public function setBookid(?string $bookid): static
    {
        $this->bookid = $bookid;

        return $this;
    }
}
