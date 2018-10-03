<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/test.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


     /**
     * @Route("/user/test", name="testRoleUser")
     */
    public function testRoleUserAction(Request $request){
        // $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('test_roles/hello-world.html.twig');
    }

    /**
     * @Route("/admin/test", name="testRoleAdmin")
     */
    public function testRoleAdminAction(Request $request){
        // $this->denyAcccessUnlessGranted('ROLE_ADMIN');

        // Va modifier l'email de l'utilisateur connecté
        // $user = $this->getUser()->setEmail('WF3WRT@wf3.fr');

        // $em = $this->getDoctrine()->getManager();
        // $em->persist($user);
        // $em->flush();

        return $this->render('test_roles/hello-world-admin.html.twig');
    }


}
