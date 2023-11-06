<?php

namespace App\Entity;

use App\Repository\SemaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemaineRepository::class)]
class Semaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $annee = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumSemaine = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateDebut = null;

    #[ORM\ManyToOne(inversedBy: 'semaines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?saison $saison = null;

    #[ORM\ManyToMany(targetEntity: reservation::class, inversedBy: 'semaines')]
    private Collection $reservation;

    #[ORM\OneToMany(mappedBy: 'semaine', targetEntity: Saison::class)]
    private Collection $saisons;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->saisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNumSemaine(): ?string
    {
        return $this->NumSemaine;
    }

    public function setNumSemaine(string $NumSemaine): static
    {
        $this->NumSemaine = $NumSemaine;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): static
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getSaison(): ?saison
    {
        return $this->saison;
    }

    public function setSaison(?saison $saison): static
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * @return Collection<int, reservation>
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(reservation $reservation): static
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation->add($reservation);
        }

        return $this;
    }

    public function removeReservation(reservation $reservation): static
    {
        $this->reservation->removeElement($reservation);

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
            $saison->setSemaine($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): static
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getSemaine() === $this) {
                $saison->setSemaine(null);
            }
        }

        return $this;
    }
}
