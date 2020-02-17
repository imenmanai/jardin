<?php


namespace platBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
/**
 *@ORM\Entity()

 */
class plat
{
    /**
     *@ORM\Column(type="integer")
     *@ORM\Id
     *@ORM\GeneratedValue(strategy="AUTO")
     */
private $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
private $nom;
    /**
     * @ORM\Column(type="string",length=255)
     */
private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png","image/jpg","image/GIF" })
     */
private $image;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
private $date;

    /**
     * plat constructor.
     * @param $nom
     * @param $description
     * @param string $image
     * @param $date
     */
    public function __construct($nom, $description, $image, $date)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
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





}