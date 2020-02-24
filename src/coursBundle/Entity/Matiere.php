<?php


namespace coursBundle\Entity;

use Doctrine\ORM\Mapping as ORM ;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     * @Assert\Range(
     *      min = 1,
     *      max = 9,
     *      minMessage = "on peut pas accepter un coefficient <1",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     *
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