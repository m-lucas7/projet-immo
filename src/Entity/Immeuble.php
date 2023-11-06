<?php

namespace App\Entity;

use App\Repository\ImmeubleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleRepository::class)]
class Immeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumImmeuble = null;

    #[ORM\Column(length: 255)]
    private ?string $NomImmeuble = null;

    #[ORM\Column(length: 255)]
    private ?string $RueImmeuble = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $CPImmeuble = null;

    #[ORM\Column(length: 255)]
    private ?string $VilleImmeuble = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumImmeuble(): ?string
    {
        return $this->NumImmeuble;
    }

    public function setNumImmeuble(string $NumImmeuble): static
    {
        $this->NumImmeuble = $NumImmeuble;

        return $this;
    }

    public function getNomImmeuble(): ?string
    {
        return $this->NomImmeuble;
    }

    public function setNomImmeuble(string $NomImmeuble): static
    {
        $this->NomImmeuble = $NomImmeuble;

        return $this;
    }

    public function getRueImmeuble(): ?string
    {
        return $this->RueImmeuble;
    }

    public function setRueImmeuble(string $RueImmeuble): static
    {
        $this->RueImmeuble = $RueImmeuble;

        return $this;
    }

    public function getCPImmeuble(): ?string
    {
        return $this->CPImmeuble;
    }

    public function setCPImmeuble(string $CPImmeuble): static
    {
        $this->CPImmeuble = $CPImmeuble;

        return $this;
    }

    public function getVilleImmeuble(): ?string
    {
        return $this->VilleImmeuble;
    }

    public function setVilleImmeuble(string $VilleImmeuble): static
    {
        $this->VilleImmeuble = $VilleImmeuble;

        return $this;
    }
}
