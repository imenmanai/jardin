<?php


namespace reclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="reclamationBundle\Repository\reclamationRepository")
 */
class reclamation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $etat;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="ecrire haja")
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="CategorieReclamation")
     * @ORM\JoinColumn(name="CategorieReclamation",referencedColumnName="ref")
     */
    private $CategorieReclamation;
    /**
     * @ORM\ManyToOne(targetEntity="mainBundle\Entity\User")
     * @ORM\JoinColumn(name="idParent",referencedColumnName="id")
     */
    private $idParent;

    /**
     * @return mixed
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * @param mixed $idParent
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;
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
        return $this->date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategorieReclamation()
    {
        return $this->CategorieReclamation;
    }

    /**
     * @param mixed $CategorieReclamation
     */
    public function setCategorieReclamation($CategorieReclamation)
    {
        $this->CategorieReclamation = $CategorieReclamation;
    }

}