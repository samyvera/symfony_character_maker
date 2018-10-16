<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitClassRepository")
 */
class UnitClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\StatsModifier", inversedBy="unitClass", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $statsModifier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unit", mappedBy="unitClass", orphanRemoval=true)
     */
    private $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatsModifier(): ?StatsModifier
    {
        return $this->statsModifier;
    }

    public function setStatsModifier(StatsModifier $statsModifier): self
    {
        $this->statsModifier = $statsModifier;

        return $this;
    }

    /**
     * @return Collection|Unit[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Unit $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setUnitClass($this);
        }

        return $this;
    }

    public function removeUnit(Unit $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getUnitClass() === $this) {
                $unit->setUnitClass(null);
            }
        }

        return $this;
    }
}
