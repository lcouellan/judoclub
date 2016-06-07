<?php

namespace JudoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $judokas = $this->getDoctrine()
            ->getRepository('JudoBundle:Judoka')
            ->findAll();
        return $this->render('JudoBundle:Default:index.html.twig',["judokas"=>$judokas]);
    }
}
