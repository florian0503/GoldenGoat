<?php

// src/Entity/Footballer.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Footballer
{
#[ORM\Id, ORM\GeneratedValue, ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 100)]
private ?string $firstName = null;

#[ORM\Column(length: 100)]
private ?string $lastName = null;

#[ORM\Column(length: 100)]
private ?string $team = null;

#[ORM\Column(length: 100)]
private ?string $nationality = null;

#[ORM\Column(length: 100, nullable: true)]
private ?string $origin = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $image = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $flagImage = null;

#[ORM\Column(length: 7)]
private ?string $color = null; // stocke par ex. "#CBAD83"

public function getId(): ?int { return $this->id; }

public function getFirstName(): ?string { return $this->firstName; }
public function setFirstName(string $v): static { $this->firstName = $v; return $this; }

public function getLastName(): ?string { return $this->lastName; }
public function setLastName(string $v): static { $this->lastName = $v; return $this; }

public function getTeam(): ?string { return $this->team; }
public function setTeam(string $v): static { $this->team = $v; return $this; }

public function getNationality(): ?string { return $this->nationality; }
public function setNationality(string $v): static { $this->nationality = $v; return $this; }

public function getOrigin(): ?string { return $this->origin; }
public function setOrigin(?string $v): static { $this->origin = $v; return $this; }

public function getImage(): ?string { return $this->image; }
public function setImage(?string $v): static { $this->image = $v; return $this; }

public function getFlagImage(): ?string { return $this->flagImage; }
public function setFlagImage(?string $v): static { $this->flagImage = $v; return $this; }

public function getColor(): ?string { return $this->color; }
public function setColor(string $v): static { $this->color = $v; return $this; }

public function __toString(): string
{
    return $this->firstName . ' ' . $this->lastName;
}
}
