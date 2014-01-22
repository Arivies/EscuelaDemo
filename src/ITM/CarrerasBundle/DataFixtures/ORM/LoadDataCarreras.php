<?php

namespace ITM\CarrerasBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ITM\CarrerasBundle\Entity\Carreras;

class LoadDataCarreras extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $carreras = array(
            array('nombre' => 'Ing. Industrial'),
            array('nombre' => 'Ing. en Logística'),
            array('nombre' => 'Ing. Mecatrónica'),
            array('nombre' => 'Ing. Mecánica'),
            array('nombre' => 'Ing. en Sistemas Computacionales'),
            array('nombre' => 'Ing. en Gestión Empresarial'),
            array('nombre' => 'Ing. en Informática'),
            array('nombre' => 'Ing. en Energías Renovables'),
            array('nombre' => 'Ing. Electrónica'),
            array('nombre' => 'Ing. Química'),
            array('nombre' => 'Ing. Eléctrica')
        );

        foreach ($carreras as $carrera) {
            $entidad = new Carreras();
            $entidad->setNombre($carrera['nombre']);
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}