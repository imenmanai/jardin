<?php

namespace evenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="evenementBundle\Repository\ParticipationRepository")
 */
class Participation
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="mainBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id", onDelete="CASCADE")
     */
    private $User;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdEvent", referencedColumnName="IdEvent" )
     * })
     */
    private $Event;

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param int $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }

    /**
     * @return int
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * @param int $Event
     */
    public function setEvent($Event)
    {
        $this->Event = $Event;
    }






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
     * Set nbPlace
     *
     * @param integer $nbPlace
     *
     * @return Participation
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return int
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }
}

