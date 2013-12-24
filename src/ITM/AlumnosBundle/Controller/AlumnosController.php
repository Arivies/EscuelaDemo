<?php

namespace ITM\AlumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ITM\AlumnosBundle\Entity\Alumnos;
use ITM\AlumnosBundle\Form\AlumnosType;

/**
 * Alumnos controller.
 *
 * @Route("/alumnos")
 */
class AlumnosController extends Controller
{

    public function portadaAction()
    {
        return $this->render('AlumnosBundle:Alumnos:portada.html.twig');
    }
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

        $entities = $em->getRepository('AlumnosBundle:Alumnos')->findAlumnos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return $this->render('AlumnosBundle:Alumnos:index.html.twig', array('entities' => $pagination));
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

        return array('entity' => $entity);
    }

    public function nuevoAction()
    {
        $alumno = new Alumnos();
        $formulario = $this->createForm(new AlumnosType(), $alumno, array(
            'action' => $this->generateUrl('alumnos_registro'),
            'method' => 'POST',
        ));
        
        return $this->render('AlumnosBundle:Alumnos:nuevo.html.twig', array('formulario' => $formulario->createView())
        );
    }

    public function registroAction()
    {
        $peticion = $this->getRequest();

        $alumno = new Alumnos();
        $formulario = $this->createForm(new AlumnosType(), $alumno, array(
            'action' => $this->generateUrl('alumnos_registro'),
            'method' => 'POST',
        ));
        $formulario->handleRequest($peticion);

        if($formulario->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($alumno);
            $em->flush();            

            return $this->redirect($this->generateUrl('alumnos'));
        }
        
        return $this->render('AlumnosBundle:Alumnos:nuevo.html.twig', array('formulario' => $formulario->createView())
        );
    }
}
