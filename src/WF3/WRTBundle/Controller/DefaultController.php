<?php

namespace WF3\WRTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use WF3\WRTBundle\Entity\Cartes;
use WF3\WRTBundle\Entity\Coordonnees;
use Symfony\Component\HttpFoundation\Request;
use WF3\WRTBundle\Form\CartesType;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('@WF3WRT/Default/index.html.twig');
    }
	
	/**
     * @Route("/hello/{prenom}")
     */
    public function helloAction($prenom)
    {
        return new Response('Bonjour ' . $prenom);
    }


    /**
     * @Route("/fonctionnalite", name="fonctionnalite")
     */
    public function fonctionnaliteAction()
    {
        return $this->render('@WF3WRT/Cartes/fonctionnalite.html.twig');
    }
}
