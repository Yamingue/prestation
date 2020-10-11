<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviRepository::class)
 */
class Suivi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cause;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=Rapport::class, mappedBy="suivi", orphanRemoval=true)
     */
    private $rapports;

    public function __construct()
    {
        $this->rapports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCause(): ?string
    {
        return $this->cause;
    }

    public function setCause(?string $cause): self
    {
        $this->cause = $cause;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Rapport[]
     */
    public function getRapports(): Collection
    {
        return $this->rapports;
    }

    public function addRapport(Rapport $rapport): self
    {
        if (!$this->rapports->contains($rapport)) {
            $this->rapports[] = $rapport;
            $rapport->setSuivi($this);
        }

        return $this;
    }

    public function removeRapport(Rapport $rapport): self
    {
        if ($this->rapports->contains($rapport)) {
            $this->rapports->removeElement($rapport);
            // set the owning side to null (unless already changed)
            if ($rapport->getSuivi() === $this) {
                $rapport->setSuivi(null);
            }
        }

        return $this;
    }
}
