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
            array('nombre' => 'Ingeniería Industrial'),
            array('nombre' => 'Ingeniería en Logística'),
            array('nombre' => 'Ingeniería Mecatrónica'),
            array('nombre' => 'Ingeniería Mecánica'),
            array('nombre' => 'Ingeniería Sistemas Computacionales'),
            array('nombre' => 'Ingeniería en Gestión Empresarial'),
            array('nombre' => 'Ingenieria en Informática'),
            array('nombre' => 'Ingenieria en Energías Renovables'),
            array('nombre' => 'Ingeniería Electrónica'),
            array('nombre' => 'Ingeniería Química'),
            array('nombre' => 'Ingeniería Eléctrica')
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