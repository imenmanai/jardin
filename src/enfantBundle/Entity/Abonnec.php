<?php


namespace enfantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity()

 */
class Abonnec
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
    private $type;
    /**
     * @ORM\Column(type="string",length=255)
     */

    private $DateD;
    /**
     * @ORM\Column(type="string")
     */

    private $etat;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $DateF;

    /**
     * @ORM\ManyToOne(targetEntity="mainBundle\Entity\User")
     * @ORM\JoinColumn(name="idParent",referencedColumnName="id")
     */
    private $idParent;

    /**
     * @return mixed
     */
    public function getDateD()
    {
        return $this->DateD;
    }

    /**
     * @param mixed $DateD
     */
    public function setDateD($DateD)
    {
        $this->DateD = $DateD;
    }

    /**
     * @return mixed
     */
    public function getDateF()
    {
        return $this->DateF;
    }

    /**
     * @param mixed $DateF
     */
    public function setDateF($DateF)
    {
        $this->DateF = $DateF;
    }

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
     * Abonnec constructor.
     * @param $type
     * @param $DateDebut
     * @param $etat
     * @param $DateFin
     */
    public function __construct($type, $DateDebut, $DateFin)
    {
        $this->type = $type;
        $this->DateD = $DateDebut;
        $this->DateF = $DateFin;
        $this->etat="makhalasech";
    }

    public function __toString()
    {
return    $this->type+$this->DateD+  $this->DateF;}

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }




}