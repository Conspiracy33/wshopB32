<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 * @ORM\Table(name="projet")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($Id)
    {
        $this->id = $Id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($Nom)
    {
        $this->nom = $Nom;
    }

    /**
     * @ORM\Column(type="integer",name="nombreJetons")
     */
    private $nbJetons;

    public function getNbJetons()
    {
        return $this->nbJetons;
    }

    public function setNbJetons($NbJetons)
    {
        $this->nbJetons = $NbJetons;
    }
}
