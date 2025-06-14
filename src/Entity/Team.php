<?php

// src/Entity/Team.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity]
#[Vich\Uploadable]
class Team
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string", length:100)]
    private ?string $name = null;

    // On stocke juste le nom de fichier en base :
    #[ORM\Column(type:"string", length:255, nullable:true)]
    private ?string $logoFilename = null;

    #[Vich\UploadableField(mapping:"team_logos", fileNameProperty:"logoFilename")]
    private ?\Symfony\Component\HttpFoundation\File\UploadedFile $logoFile = null;

    // … getters/setters …
}
