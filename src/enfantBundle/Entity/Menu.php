<?php


namespace enfantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity(repositoryClass="enfantBundle\Repository\AbonneRepository")

 */
class Menu
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $Date;


    /**
     * @ORM\ManyToOne(targetEntity="Enfant")
     * @ORM\JoinColumn(name="idEnfant",referencedColumnName="id")
     */
    private $idEnfant;

    /**
     * Menu constructor.
     * @param $Date
     * @param $idEnfant
     */
    public function __construct($Date, $idEnfant)
    {
        $this->Date = $Date;
        $this->idEnfant = $idEnfant;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getIdEnfant()
    {
        return $this->idEnfant;
    }

    /**
     * @param mixed $idEnfant
     */
    public function setIdEnfant($idEnfant)
    {
        $this->idEnfant = $idEnfant;
    }




}