<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsModifierRepository")
 */
class StatsModifier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthModifier;

    /**
     * @ORM\Column(type="integer")
     */
    private $attackModifier;

    /**
     * @ORM\Column(type="integer")
     */
    private $magicModifier;

    /**
     * @ORM\Column(type="integer")
     */
    private $defenseModifier;

    /**
     * @ORM\Column(type="integer")
     */
    private $resistanceModifier;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UnitClass", mappedBy="statsModifier", cascade={"persist", "remove"})
     */
    private $unitClass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHealthModifier(): ?int
    {
        return $this->healthModifier;
    }

    public function setHealthModifier(int $healthModifier): self
    {
        $this->healthModifier = $healthModifier;

        return $this;
    }

    public function getAttackModifier(): ?int
    {
        return $this->attackModifier;
    }

    public function setAttackModifier(int $attackModifier): self
    {
        $this->attackModifier = $attackModifier;

        return $this;
    }

    public function getMagicModifier(): ?int
    {
        return $this->magicModifier;
    }

    public function setMagicModifier(int $magicModifier): self
    {
        $this->magicModifier = $magicModifier;

        return $this;
    }

    public function getDefenseModifier(): ?int
    {
        return $this->defenseModifier;
    }

    public function setDefenseModifier(int $defenseModifier): self
    {
        $this->defenseModifier = $defenseModifier;

        return $this;
    }

    public function getResistanceModifier(): ?int
    {
        return $this->resistanceModifier;
    }

    public function setResistanceModifier(int $resistanceModifier): self
    {
        $this->resistanceModifier = $resistanceModifier;

        return $this;
    }

    public function getUnitClass(): ?UnitClass
    {
        return $this->unitClass;
    }

    public function setUnitClass(UnitClass $unitClass): self
    {
        $this->unitClass = $unitClass;

        // set the owning side of the relation if necessary
        if ($this !== $unitClass->getStatsModifier()) {
            $unitClass->setStatsModifier($this);
        }

        return $this;
    }
}
