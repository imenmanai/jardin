<?php
// src/AppBundle/Entity/User.php

namespace mainBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="enfantBundle\Entity\Enfant")
     * @ORM\JoinColumn(name="idEnfant",referencedColumnName="id")
     */
    private $idEnfant;
    /**
     * @ORM\ManyToOne(targetEntity="enfantBundle\Entity\Enfant")
     * @ORM\JoinColumn(name="idEnfant",referencedColumnName="id")
     */
    private $numerro;


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

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}