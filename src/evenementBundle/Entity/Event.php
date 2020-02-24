<?php


namespace evenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM ;
use Symfony\Component\Validator\Constraints as Assert ;
/**
 * @ORM\Entity(repositoryClass="evenementBundle\Repository\EventRepository")
 *
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column( name="IdEvent",type="integer" )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     */
    private $description;
    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\GreaterThan("today",message="Vous devez saisir une date superieur a date aujourd'hui")

     */
    private $date;
    /**
     * @ORM\Column(name="date_fin", type="datetime")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\GreaterThan(propertyPath="date")
     */
    private $datefin;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "on peut pas accepter moins qu une place",
     * )
     */
    private $nbpart;
    /**
     * @var string
     *
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "^[a-zA-Z]+$",message="interdit d utiliser les caracteres speciaux"
     * )
     *
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $local;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=500)
     * @Assert\File(maxSize="500k", mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    public $image;

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getNbpart()
    {
        return $this->nbpart;
    }

    /**
     * @param mixed $nbpart
     */
    public function setNbpart($nbpart)
    {
        $this->nbpart = $nbpart;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



}