<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'saison', targetEntity: Semaine::class)]
    private Collection $semaines;

    #[ORM\ManyToOne(inversedBy: 'saisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?semaine $semaine = null;

    #[ORM\ManyToMany(targetEntity: categorie::class, inversedBy: 'saisons')]
    private Collection $categorie;

    public function __construct()
    {
        $this->semaines = new ArrayCollection();
        $this->categorie = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Semaine>
     */
    public function getSemaines(): Collection
    {
        return $this->semaines;
    }

    public function addSemaine(Semaine $semaine): static
    {
        if (!$this->semaines->contains($semaine)) {
            $this->semaines->add($semaine);
            $semaine->setSaison($this);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): static
    {
        if ($this->semaines->removeElement($semaine)) {
            // set the owning side to null (unless already changed)
            if ($semaine->getSaison() === $this) {
                $semaine->setSaison(null);
            }
        }

        return $this;
    }

    public function getSemaine(): ?semaine
    {
        return $this->semaine;
    }

    public function setSemaine(?semaine $semaine): static
    {
        $this->semaine = $semaine;

        return $this;
    }

    /**
     * @return Collection<int, categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(categorie $categorie): static
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): static
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }
}
