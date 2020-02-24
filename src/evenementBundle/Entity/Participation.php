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
     * @var integer
     *
     * @ORM\Column(name="IdParticipation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparticipation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="mainBundle\Entity\User" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdUser", referencedColumnName="id" )
     * })
     */
    private $iduser;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdEvent", referencedColumnName="IdEvent" )
     * })
     */
    private $idevent;





    /**
     * @return int
     */
    public function getIdparticipation()
    {
        return $this->idparticipation;
    }

    /**
     * @param int $idparticipation
     */
    public function setIdparticipation($idparticipation)
    {
        $this->idparticipation = $idparticipation;
    }

    /**
     * @return mainBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mainBundle\Entity\User $iduser

     */
    public function setIduser( \mainBundle\Entity\User $iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return \Event
     */
    public function getIdevent()
    {
        return $this->idevent;
    }

    /**
     * @param \Event $idevent
     */
    public function setIdevent($idevent)
    {
        $this->idevent = $idevent;
    }

}

