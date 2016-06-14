<?php
/**
 * Created by PhpStorm.
 * User: lcoue
 * Date: 13/06/2016
 * Time: 15:14
 */

namespace JudoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RankingRepository extends EntityRepository
{

    public function findOneByIdClub($clubId)
    {
        $query = $this->_em->createQuery(
            'SELECT r, c FROM JudoBundle:Ranking r
            JOIN r.idClub c
            WHERE c.id = :id'
        )->setParameter('id', $clubId);

        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}