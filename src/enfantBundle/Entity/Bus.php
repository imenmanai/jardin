<?php

namespace enfantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Bus
 *
 * @ORM\Table(name="bus")
 * @ORM\Entity(repositoryClass="enfantBundle\Repository\BusRepository")
 * @UniqueEntity("matricule",message="Déja Existe!")
 * @UniqueEntity("ligne",message="Déja Existe!")
 */
class Bus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\Length(min=6,max=20,minMessage="Doit être supérieur à 6.",maxMessage="Ne doit pas dépasser 20.")
     */
    private $matricule;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlaces", type="integer")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     */
    private $nbPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $ligne;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Bus
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     *
     * @return Bus
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return int
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * @return string
     */
    public function getLigne()
    {
        return $this->ligne;
    }

    /**
     * @param string $ligne
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;
    }


}