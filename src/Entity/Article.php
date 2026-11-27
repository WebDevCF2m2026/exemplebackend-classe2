<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
# création des protections de la DB : contraintes
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    // on ajoute unsigned à notre id de table Article
    #[ORM\Column(
        options: [
            'unsigned' => true
        ]
    )]
    private ?int $id = null;

    #[ORM\Column(
        length: 120,
    )]
    #[Assert\NotBlank(
        message: 'Le titre est obligatoire',
    )]
    #[Assert\Length(
        min: 3,
        max: 120,
        minMessage: '3 caractères minimum',
        maxMessage: '120 caractères maximum',
    )]
    private ?string $ArticleTitle = null;

    #[ORM\Column(
        length: 124,
        unique: true,
        )]
    #[Assert\NotBlank(
        message: 'Le slug est obligatoire',
    )]
    #[Assert\Length(
        min: 3,
        max: 124,
        minMessage: '3 caractères minimum',
        maxMessage: '124 caractères maximum'
    )]
    private ?string $ArticleSlug = null;

     #[ORM\Column(
        type: Types::TEXT,
    )]
    #[Assert\Length(
        min: 3,
        minMessage: 'La description est obligatoire',
    )]
    #[Assert\NotBlank(
        message: 'Le texte est obligatoire',
    )]
    private ?string $ArticleContent = null;

    #[ORM\Column(
        type: Types::DATETIME_IMMUTABLE,
        nullable: true,
        columnDefinition: 'DATETIME DEFAULT CURRENT_TIMESTAMP',
    )]
    private ?\DateTimeImmutable $ArticleDateCreated = null;

     #[ORM\Column(
        type: Types::DATETIME_IMMUTABLE,
        nullable: true,
        columnDefinition: 'DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
    )]
    private ?\DateTimeImmutable $ArticleDateUpdate = null;

    #[ORM\Column(
        type: Types::BOOLEAN,
        nullable: false,
        options: [
            "default" => false,
        ]
    )]
    private ?bool $ArticleIsVisible = null;

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

    public function getArticleDateUpdate(): ?\DateTimeImmutable
    {
        return $this->ArticleDateUpdate;
    }

    public function setArticleDateUpdate(?\DateTimeImmutable $ArticleDateUpdate): static
    {
        $this->ArticleDateUpdate = $ArticleDateUpdate;

        return $this;
    }

    public function isArticleIsVisible(): ?bool
    {
        return $this->ArticleIsVisible;
    }

    public function setArticleIsVisible(bool $ArticleIsVisible): static
    {
        $this->ArticleIsVisible = $ArticleIsVisible;

        return $this;
    }
}

