<?php


namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
/**
 * @ORM\Entity
 */

class Personnel
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="azizaaaaaaaaaa")
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="azizaaaaaaaaaa")
     */
    private $prenom;
    /**
     * @ORM\Column(type="integer", length=255)
     *
     * @Assert\GreaterThan(
     *     value=0
     *     )
     */
    private $age;
    /**
     * @ORM\Column(type="integer", length=255)
     *
     * @Assert\GreaterThan(
     *     value=0
     *     )
     */
    private $nbH;

    /**
     * @ORM\Column(type="integer" ,length=255)
     *
     * @Assert\GreaterThan(
     *     value=0
     *     )
     */
    private $prixH;
    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="categorie",
     *     referencedColumnName="id")
     */
    private $categorie;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png","image/jpg","image/GIF" })
     */
    private $image;

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
    public function getNbH()
    {
        return $this->nbH;
    }

    /**
     * @param mixed $nbH
     */
    public function setNbH($nbH)
    {
        $this->nbH = $nbH;
    }

    /**
     * @return mixed
     */
    public function getPrixH()
    {
        return $this->prixH;
    }

    /**
     * @param mixed $prixH
     */
    public function setPrixH($prixH)
    {
        $this->prixH = $prixH;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}