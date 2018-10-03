<?php 

namespace WF3\WRTBundle\Controller;

use WF3\WRTBundle\Entity\Coordonnees;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WF3\WRTBundle\Form\CartesType;
use Doctrine\Common\Util\Debug;
use WF3\WRTBundle\Entity\Cartes;



class CoordonneesController extends Controller{

    public function getCoordonneesById(){

    }
        

    /**
     *   
     * @Route("/coordonnees")
     */
    public function coordonneesAction()
    {
        $repository = $this -> getDoctrine() -> getRepository(Coordonnees::class);
        $coor = $repository -> findAll();
        echo '<pre>';
        Debug::dump($coor);
        echo '</pre>';
        

        return new response('test');
    }









}

