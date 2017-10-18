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

    /**
     * @Route("/section/{id}", name="sections")
     */
    public function sectionAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $rub = $em->getRepository('AppBundle:Section')->findAll();
        $titlesection = $em->getRepository('AppBundle:Section')->find($id);
        $repository = $em->getRepository('AppBundle:Article');

                $news = $repository->createQueryBuilder('a')
                     ->innerJoin('a.section', 'g')
                     ->where('g.id = :idactu')
                     ->setParameter('idactu', $id)
                     ->getQuery()->getResult();
        dump($news);

        // replace this example code with whatever you need
        return $this->render('default/section.html.twig', [
            "sectiontitle" => $titlesection,
            "thenews"=>$news,
            "sections"=>$rub
        ]);
    }
}
