<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumAppart = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $Superficie = null;

    #[ORM\Column(length: 255)]
    private ?string $Descriptif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAppart(): ?string
    {
        return $this->NumAppart;
    }

    public function setNumAppart(string $NumAppart): static
    {
        $this->NumAppart = $NumAppart;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->Superficie;
    }

    public function setSuperficie(string $Superficie): static
    {
        $this->Superficie = $Superficie;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->Descriptif;
    }

    public function setDescriptif(string $Descriptif): static
    {
        $this->Descriptif = $Descriptif;

        return $this;
    }
}
