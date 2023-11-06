<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Appartement::class)]
    private Collection $appartements;

    #[ORM\ManyToMany(targetEntity: Saison::class, mappedBy: 'categorie')]
    private Collection $saisons;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
        $this->saisons = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Appartement>
     */
    public function getAppartements(): Collection
    {
        return $this->appartements;
    }

    public function addAppartement(Appartement $appartement): static
    {
        if (!$this->appartements->contains($appartement)) {
            $this->appartements->add($appartement);
            $appartement->setCategorie($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): static
    {
        if ($this->appartements->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getCategorie() === $this) {
                $appartement->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): static
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons->add($saison);
            $saison->addCategorie($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): static
    {
        if ($this->saisons->removeElement($saison)) {
            $saison->removeCategorie($this);
        }

        return $this;
    }
}
