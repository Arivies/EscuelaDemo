<?php

namespace ITM\CarrerasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CarrerasRepository extends EntityRepository
{
	public function findCarreras()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('c')
		    ->from('CarrerasBundle:Carreras', 'c');

		return $dql->getQuery()->getResult();
	}
}