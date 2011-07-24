<?php

namespace amiguetes\PtuitBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MensajeRepository
 */
class MensajeRepository extends EntityRepository {

    public function findCronologia($id) {
        $dql = "SELECT  m FROM PtuitBundle:Mensaje  m, PtuitBundle:Usuario u 
            JOIN u.Seguidores s 
            WHERE s.id =:id
            AND m.usuario=u.id 
            OR m.usuario=:id 
            GROUP BY m.texto 
            ORDER BY m.creado DESC";
        
        return $this->getEntityManager()
            ->createQuery($dql)
            ->setParameter("id", $id)
            ->getResult();


    }

}