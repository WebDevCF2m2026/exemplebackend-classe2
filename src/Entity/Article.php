<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $ArticleTitle = null;

    #[ORM\Column(length: 124)]
    private ?string $ArticleSlug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ArticleContent = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $ArticleDateCreated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->ArticleTitle;
    }

    public function setArticleTitle(string $ArticleTitle): static
    {
        $this->ArticleTitle = $ArticleTitle;

        return $this;
    }

    public function getArticleSlug(): ?string
    {
        return $this->ArticleSlug;
    }

    public function setArticleSlug(string $ArticleSlug): static
    {
        $this->ArticleSlug = $ArticleSlug;

        return $this;
    }

    public function getArticleContent(): ?string
    {
        return $this->ArticleContent;
    }

    public function setArticleContent(string $ArticleContent): static
    {
        $this->ArticleContent = $ArticleContent;

        return $this;
    }

    public function getArticleDateCreated(): ?\DateTimeImmutable
    {
        return $this->ArticleDateCreated;
    }

    public function setArticleDateCreated(?\DateTimeImmutable $ArticleDateCreated): static
    {
        $this->ArticleDateCreated = $ArticleDateCreated;

        return $this;
    }
}

