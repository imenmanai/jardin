<?php


namespace JardinBundle\Repository;

use Doctrine\ORM\EntityRepository;
use JardinBundle\Entity\Personnel;
use Doctrine\ORM\Query;
class PostRepository extends EntityRepository
{
<<<<<<< HEAD

=======
public function findEntitiesByString($str){
    return $this->getEntityManager()->createQuery(
        'SELECT p FROM JardinBundle:Personnel p where p.nom LIKE : str'
    )
        ->setParameter('str','%'.'str'.'%')->getResult();
}
>>>>>>> 9c216b0b00143a319616303a9538bae4b4f9d770
}