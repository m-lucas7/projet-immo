<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $CodeCategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleCategorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCategorie(): ?string
    {
        return $this->CodeCategorie;
    }

    public function setCodeCategorie(string $CodeCategorie): static
    {
        $this->CodeCategorie = $CodeCategorie;

        return $this;
    }

    public function getLibelleCategorie(): ?string
    {
        return $this->LibelleCategorie;
    }

    public function setLibelleCategorie(string $LibelleCategorie): static
    {
        $this->LibelleCategorie = $LibelleCategorie;

        return $this;
    }
}
