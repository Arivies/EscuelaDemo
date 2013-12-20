<?php

namespace ITM\AlumnosBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ITM\AlumnosBundle\Entity\Alumnos;

/**
 * Alumnos controller.
 *
 * @Route("/alumnos")
 */
class AlumnosController extends Controller
{

    /**
     * Lists all Alumnos entities.
     *
     * @Route("/", name="alumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AlumnosBundle:Alumnos')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Alumnos entity.
     *
     * @Route("/{id}", name="alumnos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}