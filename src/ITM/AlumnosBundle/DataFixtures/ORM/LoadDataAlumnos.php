<?php

namespace ITM\AlumnosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ITM\AlumnosBundle\Entity\Alumnos;

class LoadDataAlumnos extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $carrera_a = $manager->getRepository('CarrerasBundle:Carreras')->find(2);
        $carrera_b = $manager->getRepository('CarrerasBundle:Carreras')->find(3);
        $carrera_c = $manager->getRepository('CarrerasBundle:Carreras')->find(9);
        $carrera_d = $manager->getRepository('CarrerasBundle:Carreras')->find(5);
        $carrera_e = $manager->getRepository('CarrerasBundle:Carreras')->find(8);

        $alumnos_a = array(
            array('nocontrol' => '07493258',
                  'nombre' => 'ROGELIO', 'app' => 'MALDONADO', 'apm' => 'CEJA'),
            array('nocontrol' => '07495325',
                  'nombre' => 'ROSALINO', 'app' => 'GARCIA', 'apm' => 'ACEBEDO'),
            array('nocontrol' => '07491142',
                  'nombre' => 'ESTREBERTO', 'app' => 'DURON', 'apm' => 'MANRIQUEZ'),
            array('nocontrol' => '07496251',
                  'nombre' => 'ERNESTO', 'app' => 'AVILEZ', 'apm' => 'PERALTA'),
            array('nocontrol' => '07498936',
                  'nombre' => 'GUILLERMO', 'app' => 'VELASCO', 'apm' => 'GUERRA')  
        );

        $alumnos_b = array(
            array('nocontrol' => '07498963',
                  'nombre' => 'EVA', 'app' => 'PEREZ', 'apm' => 'HERNANDEZ'),
            array('nocontrol' => '99490982', 
                  'nombre' => 'LUCERO', 'app' => 'HERNANDEZ' , 'apm' => 'LOPEZ'),
            array('nocontrol' => '99490984', 
                  'nombre' => 'JOSE', 'app' => 'MILLAN', 'apm' => 'RUIZ'), 
            array('nocontrol' => '99490985', 
                  'nombre' => 'MARIO', 'app' => 'MOLINA', 'apm' => 'SANCHEZ'),
            array('nocontrol' => '99490987', 
                  'nombre' => 'MARTIN', 'app' => 'ROBLES', 'apm' => 'ILICH')
        );

        $alumnos_c = array(
            array('nocontrol' => '07492513',
                  'nombre' => 'CATARINO', 'app' => 'OLEA', 'apm' => 'ROJAS'),
            array('nocontrol' => '07490145',
                  'nombre' => 'PLACIDO', 'app' => 'GARCIA', 'apm' => 'RAMOS'),
            array('nocontrol' => '07490583',
                  'nombre' => 'PEDRO', 'app' => 'PEREZ', 'apm' => 'CORRALES'),
            array('nocontrol' => '07490682',
                  'nombre' => 'ADELINA', 'app' => 'DANIELS', 'apm' => 'GAYTAN'),
            array('nocontrol' => '07490583',
                  'nombre' => 'CONSUELO', 'app' => 'MORENO', 'apm' => 'SALINAS')

        );

        $alumnos_d = array(
            array('nocontrol' => '99490989', 
                  'nombre' => 'BRAULIO', 'app' => 'GALINDO', 'apm' => 'RAMIREZ'),
            array('nocontrol' => '99490992', 
                  'nombre' => 'ANGELICA', 'app' => 'AYALA', 'apm' => 'MOLDRANO'),
            array('nocontrol' => '99490993', 
                  'nombre' => 'DANTE', 'app' => 'JUAREZ', 'apm' => 'MONTIEL'), 
            array('nocontrol' => '99490994', 
                  'nombre' => 'MARIA', 'app' => 'RAMIREZ', 'apm' => 'ESTRADA'),
            array('nocontrol' => '99490996', 
                  'nombre' => 'AARON', 'app' => 'TEJEDA', 'apm' => 'OLIVAS'), 
        );

        $alumnos_e = array(
             array('nocontrol' => '99490659', 
                   'nombre' => 'MANUEL', 'app' => 'BUENROSTRO', 'apm' => 'GONZALEZ'),
             array('nocontrol' => '99490661', 
                   'nombre' => 'MARIO', 'app' => 'CAMARILLO', 'apm' => 'RAMOS'), 
             array('nocontrol' => '99490662', 
                   'nombre' => 'DANIEL', 'app' => 'CAMPOS', 'apm' => 'FRIAS'),
             array('nocontrol' => '99490664', 
                   'nombre' => 'MOISES', 'app' => 'CASTRO', 'apm' => 'FLORES'),
             array('nocontrol' => '99490670', 
                   'nombre' => 'JULIO', 'app' => 'CORTEZ', 'apm' => 'RODRIGUEZ') 
        );

        foreach ($alumnos_a as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['nocontrol']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['app']);
            $entidad->setApellidoMaterno($alumno['apm']);
            $entidad->setCarrera($carrera_a);
            $manager->persist($entidad);
        }
        
        $manager->flush();

        foreach ($alumnos_b as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['nocontrol']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['app']);
            $entidad->setApellidoMaterno($alumno['apm']);
            $entidad->setCarrera($carrera_b);
            $manager->persist($entidad);
        }
        
        $manager->flush();

        foreach ($alumnos_c as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['nocontrol']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['app']);
            $entidad->setApellidoMaterno($alumno['apm']);
            $entidad->setCarrera($carrera_c);
            $manager->persist($entidad);
        }
        
        $manager->flush();

        foreach ($alumnos_d as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['nocontrol']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['app']);
            $entidad->setApellidoMaterno($alumno['apm']);
            $entidad->setCarrera($carrera_d);
            $manager->persist($entidad);
        }
        
        $manager->flush();

        foreach ($alumnos_e as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['nocontrol']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['app']);
            $entidad->setApellidoMaterno($alumno['apm']);
            $entidad->setCarrera($carrera_e);
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}