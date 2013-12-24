<?php

namespace ITM\AlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosRepository extends EntityRepository
{
	public function findAlumnos()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a')
		    ->from('AlumnosBundle:Alumnos', 'a');

		return $dql->getQuery()->getResult();
	}

	public function findAlumno($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a')
		    ->from('AlumnosBundle:Alumnos', 'a')
		    ->where('a.id = :id_alumno' );
 		
 		$dql -> setParameter('id_alumno', $id);

		return $dql->getQuery()->getSingleResult();
	}

	public function eliminarAlumno($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('AlumnosBundle:Alumnos', 'a')
		    ->where('a.id = :id_alumno' );
 		$dql -> setParameter('id_alumno', $id);

		return $dql->getQuery()->getResult();
	}
}