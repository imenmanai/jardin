<?php


namespace coursBundle\Entity;

use Doctrine\ORM\Mapping as ORM ;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 *
 */
class Cours
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $description;
    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $duree;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\Range(
     *      min = 1,
     *      max = 30,
     *      minMessage = "on peut pas accepter moins qu une place",
     *      maxMessage = "on peut pas accepter plus que 30 places"
     * )
     */
    private $seats;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $age;
    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="matiere",referencedColumnName="id",onDelete="CASCADE")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $matiere;

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
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param mixed $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * @param mixed $matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }

}