<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article {
    #[Groups(['articles'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['articlelist'])]
    #[ORM\Column]
    private ?string $articleName = null;

    #[Groups(['articlelist'])]
    #[ORM\Column]
    private ?string $articlePrice = null;

    public function __construct() {

    }


    public function getArticleName(): ?self
    {
        return $this->articleName;
    }

    public function setArticleName(?self $articleName): self
    {
        $this->articleName = $articleName;

        return $this;
    }

    public function getArticlePrice(): ?self
    {
        return $this->articleName;
    }

    public function setArticlePrice(?self $articlePrice): self
    {
        $this->articlePrice = $articlePrice;

        return $this;
    }

    public function toString(): string {
        return $this->getArticleName()  ;
    }


}
