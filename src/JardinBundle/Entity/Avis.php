<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255)
     */
    private $descr;

    /**
     * @var int
     *
     * @ORM\Column(name="avis", type="integer")
     */
    private $avis;


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
     * Set descr
     *
     * @param string $descr
     *
     * @return Avis
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr
     *
     * @return string
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set avis
     *
     * @param integer $avis
     *
     * @return Avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return int
     */
    public function getAvis()
    {
        return $this->avis;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumn(name="personnel",
     *     referencedColumnName="id")
     */
    private $personnel;

    /**
     * @return mixed
     */
    public function getPersonnel()
    {
        return $this->personnel;
    }

    /**
     * @param mixed $personnel
     */
    public function setPersonnel($personnel)
    {
        $this->personnel = $personnel;
    }
}

