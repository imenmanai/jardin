<?php


namespace reclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="CategorieReclamation")
     * @ORM\JoinColumn(name="CategorieReclamation",referencedColumnName="ref")
     */
    private $CategorieReclamation;

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