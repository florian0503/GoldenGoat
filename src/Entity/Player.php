<?php

// src/Entity/Player.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity]
#[Vich\Uploadable]
class Player
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string", length:100)]
    private ?string $name = null;

    // Photo
    #[ORM\Column(type:"string", length:255, nullable:true)]
    private ?string $photoFilename = null;

    #[Vich\UploadableField(mapping:"player_photos", fileNameProperty:"photoFilename")]
    private ?\Symfony\Component\HttpFoundation\File\UploadedFile $photoFile = null;

    // Pays stocké sous forme de code ISO (fr, es, it…)
    #[ORM\Column(type:"string", length:2)]
    private ?string $country = null;

    // Relation vers Team
    #[ORM\ManyToOne(targetEntity:Team::class)]
    private ?Team $team = null;

    // … getters/setters …
}
