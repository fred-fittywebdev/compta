<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numéroComptable;

    /**
     * @ORM\OneToMany(targetEntity=Ecriture::class, mappedBy="ecritureDebiteur", orphanRemoval=true)
     */
    private $ecritures;

    /**
     * @ORM\OneToMany(targetEntity=Ecriture::class, mappedBy="compteDebiteur", orphanRemoval=true)
     */
    private $ecritureDebiteur;

    /**
     * @ORM\OneToMany(targetEntity=Ecriture::class, mappedBy="compteCrediteur", orphanRemoval=true)
     */
    private $ecrituresCrediteur;

    public function __construct()
    {
        $this->ecritures = new ArrayCollection();
        $this->ecritureDebiteur = new ArrayCollection();
        $this->ecrituresCrediteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNuméroComptable(): ?int
    {
        return $this->numéroComptable;
    }

    public function setNuméroComptable(?int $numéroComptable): self
    {
        $this->numéroComptable = $numéroComptable;

        return $this;
    }

    /**
     * @return Collection|Ecriture[]
     */
    public function getEcritureDebiteur(): Collection
    {
        return $this->ecritureDebiteur;
    }

    public function addEcritureDebiteur(Ecriture $ecritureDebiteur): self
    {
        if (!$this->ecritureDebiteur->contains($ecritureDebiteur)) {
            $this->ecritureDebiteur[] = $ecritureDebiteur;
            $ecritureDebiteur->setCompteDebiteur($this);
        }

        return $this;
    }

    public function removeEcritureDebiteur(Ecriture $ecritureDebiteur): self
    {
        if ($this->ecritureDebiteur->removeElement($ecritureDebiteur)) {
            // set the owning side to null (unless already changed)
            if ($ecritureDebiteur->getCompteDebiteur() === $this) {
                $ecritureDebiteur->setCompteDebiteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ecriture[]
     */
    public function getEcrituresCrediteur(): Collection
    {
        return $this->ecrituresCrediteur;
    }

    public function addEcrituresCrediteur(Ecriture $ecrituresCrediteur): self
    {
        if (!$this->ecrituresCrediteur->contains($ecrituresCrediteur)) {
            $this->ecrituresCrediteur[] = $ecrituresCrediteur;
            $ecrituresCrediteur->setCompteCrediteur($this);
        }

        return $this;
    }

    public function removeEcrituresCrediteur(Ecriture $ecrituresCrediteur): self
    {
        if ($this->ecrituresCrediteur->removeElement($ecrituresCrediteur)) {
            // set the owning side to null (unless already changed)
            if ($ecrituresCrediteur->getCompteCrediteur() === $this) {
                $ecrituresCrediteur->setCompteCrediteur(null);
            }
        }

        return $this;
    }
}
