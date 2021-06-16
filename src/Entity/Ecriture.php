<?php

namespace App\Entity;

use App\Repository\EcritureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcritureRepository::class)
 */
class Ecriture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="ecritureDebiteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteDebiteur;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="ecrituresCrediteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteCrediteur;

    /**
     * @ORM\Column(type="decimal", precision=2)
     */
    private $Montant;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Raison;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCompteDebiteur(): ?Compte
    {
        return $this->compteDebiteur;
    }

    public function setCompteDebiteur(?Compte $compteDebiteur): self
    {
        $this->compteDebiteur = $compteDebiteur;

        return $this;
    }

    public function getCompteCrediteur(): ?Compte
    {
        return $this->compteCrediteur;
    }

    public function setCompteCrediteur(?Compte $compteCrediteur): self
    {
        $this->compteCrediteur = $compteCrediteur;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->Montant;
    }

    public function setMontant(float $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->Raison;
    }

    public function setRaison(?string $Raison): self
    {
        $this->Raison = $Raison;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }
}