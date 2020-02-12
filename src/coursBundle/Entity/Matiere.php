<?php


namespace coursBundle\Entity;

use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 *
 */
class Matiere
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
    private $nom;
    /**
     * @ORM\Column(type="integer")
     */
    private $coeff;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCoeff()
    {
        return $this->coeff;
    }

    /**
     * @param mixed $coeff
     */
    public function setCoeff($coeff)
    {
        $this->coeff = $coeff;
    }
}