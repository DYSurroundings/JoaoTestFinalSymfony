<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:Article')->findAll();
        $rub = $em->getRepository('AppBundle:Section')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            "thenews"=>$news,
            "sections"=>$rub
        ]);
    }
}
