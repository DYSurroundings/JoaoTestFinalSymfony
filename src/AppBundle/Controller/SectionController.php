<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Section;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Section controller.
 *
 * @Route("admin/section")
 */
class SectionController extends Controller
{
    /**
     * Lists all section entities.
     *
     * @Route("/", name="admin_section_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sections = $em->getRepository('AppBundle:Section')->findAll();

        return $this->render('section/index.html.twig', array(
            'sections' => $sections,
        ));
    }

    /**
     * Creates a new section entity.
     *
     * @Route("/new", name="admin_section_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $section = new Section();
        $form = $this->createForm('AppBundle\Form\SectionType', $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();

            return $this->redirectToRoute('admin_section_show', array('id' => $section->getId()));
        }

        return $this->render('section/new.html.twig', array(
            'section' => $section,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a section entity.
     *
     * @Route("/{id}", name="admin_section_show")
     * @Method("GET")
     */
    public function showAction(Section $section)
    {

        return $this->render('section/show.html.twig', array(
            'section' => $section,
        ));
    }

    


   
}
