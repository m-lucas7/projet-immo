<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'situer', targetEntity: Immeuble::class)]
    private Collection $immeubles;

    #[ORM\ManyToMany(targetEntity: reservation::class, inversedBy: 'appartements')]
    private Collection $reserver;

    #[ORM\ManyToOne(inversedBy: 'appartements')]
    private ?categorie $categorie = null;

    public function __construct()
    {
        $this->immeubles = new ArrayCollection();
        $this->reserver = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Immeuble>
     */
    public function getImmeubles(): Collection
    {
        return $this->immeubles;
    }

    public function addImmeuble(Immeuble $immeuble): static
    {
        if (!$this->immeubles->contains($immeuble)) {
            $this->immeubles->add($immeuble);
            $immeuble->setSituer($this);
        }

        return $this;
    }

    public function removeImmeuble(Immeuble $immeuble): static
    {
        if ($this->immeubles->removeElement($immeuble)) {
            // set the owning side to null (unless already changed)
            if ($immeuble->getSituer() === $this) {
                $immeuble->setSituer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, reservation>
     */
    public function getReserver(): Collection
    {
        return $this->reserver;
    }

    public function addReserver(reservation $reserver): static
    {
        if (!$this->reserver->contains($reserver)) {
            $this->reserver->add($reserver);
        }

        return $this;
    }

    public function removeReserver(reservation $reserver): static
    {
        $this->reserver->removeElement($reserver);

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
