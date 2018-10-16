<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitRepository")
 */
class Unit
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
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mugshot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UnitClass", inversedBy="units")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unitClass;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stats", inversedBy="unit", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $stats;

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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
    
    public function getSex(): ?bool
    {
        return $this->sex;
    }

    public function setSex(bool $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getMugshot(): ?string
    {
        return $this->mugshot;
    }

    public function setMugshot(string $mugshot): self
    {
        $this->mugshot = $mugshot;

        return $this;
    }

    public function getUnitClass(): ?UnitClass
    {
        return $this->unitClass;
    }

    public function setUnitClass(?UnitClass $unitClass): self
    {
        $this->unitClass = $unitClass;

        return $this;
    }

    public function getStats(): ?Stats
    {
        return $this->stats;
    }

    public function setStats(Stats $stats): self
    {
        $this->stats = $stats;

        return $this;
    }
}
