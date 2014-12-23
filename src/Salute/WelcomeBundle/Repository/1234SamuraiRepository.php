<?php

namespace Salute\WelcomeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use \PDO;

/**
 * SamuraiRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SamuraiRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
     /*   return $this->getEntityManager()
            ->createQuery('SELECT p FROM SaluteWelcomeBundle:Samurai p ORDER BY p.name DESC')
            ->getResult();*/
      /*  return $this->getEntityManager()
            ->createQuery("
                    SELECT p FROM SaluteWelcomeBundle:Samurai p
                    JOIN p.advancedphp c
              ")
            ->getResult();*/
       /* $query = $this->getEntityManager()
            ->createQuery('
            SELECT p, c FROM SaluteWelcomeBundle:Samurai p
            JOIN p.advancedphp c
            WHERE p.id = :id'
            )->setParameter('id', 2);

        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }*/
        $host = "localhost";
        $user = "root";
        $passwd = "raz123";
        $db = "symfony2";
        try {
            # MySQL через PDO_MYSQL
            $DBH = new PDO("mysql:host=".$host.";dbname=".$db, $user, $passwd);
            $DBH->query("SET NAMES utf8");

        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        $STH = $DBH->query('SELECT * from Samurai LEFT OUTER JOIN AdvancedPhp ON Samurai.advancedphp_id = AdvancedPhp.Id');
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $STH->fetch()) {
            //$sam['name']= $row['name'];
           // $sam['skill']= $row['skill'];
            $samurai[]= $row;
        }
        return $samurai;
    }
}
