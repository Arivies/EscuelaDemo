<?php

namespace ITM\CarrerasBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ITM\CarrerasBundle\Entity\Carreras;
use ITM\CarrerasBundle\Form\CarrerasType;

/**
 * Carreras controller.
 *
 * @Route("/carreras")
 */
class CarrerasController extends Controller
{

    /**
     * Lists all Carreras entities.
     *
     * @Route("/", name="carreras")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CarrerasBundle:Carreras')->findCarreras();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return $this->render('CarrerasBundle:Carreras:index.html.twig', array('entities' => $pagination));
    }

    /**
     * Finds and displays a Carreras entity.
     *
     * @Route("/{id}", name="carreras_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CarrerasBundle:Carreras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carreras entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    public function nuevoAction()
    {
        $peticion = $this->getRequest();

        $carrera = new Carreras();
        $formulario = $this->createForm(new CarrerasType(), $carrera);

        if ($peticion->getMethod() == 'POST'){
            $formulario->bind($peticion);

            if($formulario->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($carrera);
                $em->flush();

                return $this->redirect($this->generateUrl('carreras'));
            }
        }
        
        return $this->render('CarrerasBundle:Carreras:nuevo.html.twig', array('formulario' => $formulario->createView())
        );
    }
}
