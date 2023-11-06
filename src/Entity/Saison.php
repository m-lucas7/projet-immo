<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumSaison = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleSaison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSaison(): ?string
    {
        return $this->NumSaison;
    }

    public function setNumSaison(string $NumSaison): static
    {
        $this->NumSaison = $NumSaison;

        return $this;
    }

    public function getLibelleSaison(): ?string
    {
        return $this->LibelleSaison;
    }

    public function setLibelleSaison(string $LibelleSaison): static
    {
        $this->LibelleSaison = $LibelleSaison;

        return $this;
    }
}
