<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumReserv = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateReserv = null;

    #[ORM\Column(length: 255)]
    private ?string $NomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $PrenomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $RueClient = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $CPClient = null;

    #[ORM\Column(length: 255)]
    private ?string $VilleClient = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $TelClient = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $NumChequeAcompte = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $MontantAccompte = null;

    #[ORM\Column(length: 255)]
    private ?string $EtatReserv = null;

    #[ORM\ManyToMany(targetEntity: Appartement::class, mappedBy: 'reserver')]
    private Collection $appartements;

    #[ORM\ManyToMany(targetEntity: Semaine::class, mappedBy: 'reservation')]
    private Collection $semaines;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
        $this->semaines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumReserv(): ?string
    {
        return $this->NumReserv;
    }

    public function setNumReserv(string $NumReserv): static
    {
        $this->NumReserv = $NumReserv;

        return $this;
    }

    public function getDateReserv(): ?\DateTimeInterface
    {
        return $this->DateReserv;
    }

    public function setDateReserv(\DateTimeInterface $DateReserv): static
    {
        $this->DateReserv = $DateReserv;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): static
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->PrenomClient;
    }

    public function setPrenomClient(string $PrenomClient): static
    {
        $this->PrenomClient = $PrenomClient;

        return $this;
    }

    public function getRueClient(): ?string
    {
        return $this->RueClient;
    }

    public function setRueClient(string $RueClient): static
    {
        $this->RueClient = $RueClient;

        return $this;
    }

    public function getCPClient(): ?string
    {
        return $this->CPClient;
    }

    public function setCPClient(string $CPClient): static
    {
        $this->CPClient = $CPClient;

        return $this;
    }

    public function getVilleClient(): ?string
    {
        return $this->VilleClient;
    }

    public function setVilleClient(string $VilleClient): static
    {
        $this->VilleClient = $VilleClient;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->TelClient;
    }

    public function setTelClient(string $TelClient): static
    {
        $this->TelClient = $TelClient;

        return $this;
    }

    public function getNumChequeAcompte(): ?string
    {
        return $this->NumChequeAcompte;
    }

    public function setNumChequeAcompte(string $NumChequeAcompte): static
    {
        $this->NumChequeAcompte = $NumChequeAcompte;

        return $this;
    }

    public function getMontantAccompte(): ?string
    {
        return $this->MontantAccompte;
    }

    public function setMontantAccompte(string $MontantAccompte): static
    {
        $this->MontantAccompte = $MontantAccompte;

        return $this;
    }

    public function getEtatReserv(): ?string
    {
        return $this->EtatReserv;
    }

    public function setEtatReserv(string $EtatReserv): static
    {
        $this->EtatReserv = $EtatReserv;

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
            $appartement->addReserver($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): static
    {
        if ($this->appartements->removeElement($appartement)) {
            $appartement->removeReserver($this);
        }

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
            $semaine->addReservation($this);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): static
    {
        if ($this->semaines->removeElement($semaine)) {
            $semaine->removeReservation($this);
        }

        return $this;
    }
}
