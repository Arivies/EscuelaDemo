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

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->findAlumno($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

         return $this->render('AlumnosBundle:Alumnos:show.html.twig', array('entity' => $entity));
    }

    public function nuevoAction()
    {
        $alumno = new Alumnos();
        $formulario = $this->createForm(new AlumnosType(), $alumno);
        $formulario->handleRequest($this->getRequest());

        if($formulario->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($alumno);
            $em->flush();            

            return $this->redirect($this->generateUrl('alumnos'));
        }
        
        return $this->render('AlumnosBundle:Alumnos:nuevo.html.twig', array('formulario' => $formulario->createView())
        );
    }

    public function eliminarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->eliminarAlumno($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        return $this->redirect($this->generateUrl('alumnos'));
    }

    public function actualizarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $alumno = $em->getRepository('AlumnosBundle:Alumnos')->findOneById($id);

        if (!$alumno) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        $formulario = $this->createForm(new AlumnosType(), $alumno, array(
            'action' => $this->generateUrl('alumnos_actualizar', array('id' => $alumno->getId())),
            'method' => 'PUT',
        ));

        $formulario->handleRequest($this->getRequest());

        if($formulario->isValid()){
            $em->flush();            

            return $this->redirect($this->generateUrl('alumnos'));
        }

        return $this->render('AlumnosBundle:Alumnos:actualizar.html.twig', array('formulario' => $formulario->createView()
        ));

    }
}
