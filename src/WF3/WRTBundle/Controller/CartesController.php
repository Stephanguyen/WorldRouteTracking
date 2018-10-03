<?php 

namespace WF3\WRTBundle\Controller;

use WF3\WRTBundle\Entity\Cartes;
use WF3\WRTBundle\Entity\Coordonnees;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WF3\WRTBundle\Form\CartesType;
use Doctrine\Common\Util\Debug;



class CartesController extends Controller{

    
        /**
         * 
         * @Route("/ajout/", name="ajout")
         */

        public function ajoutAction(Request $request)  {

            $cartes = new Cartes;
            // $cartes -> setStatut(0);
            
            //version longue :
            // $form = $this -> get(form.factory) -> create(cartesType::class, $cartes);

            //version raccourcie :
            $form = $this -> createForm(CartesType::class, $cartes);

            if($request -> isMethod('POST')) //est-ce que le formulaire a été posté?
            {
                $form -> handleRequest($request);
                // A partir de MAINTENANT, notre objet $cartes, contient les infos postées dans le formulaire.

                if($form -> isValid()){

                    $em = $this -> getDoctrine() -> getManager();
                    $em -> persist($cartes);
                    $em -> flush();

                    $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations ' . $cartes -> getIdCarte() . ', la carte a été ajoutée');

                    return $this -> redirectToRoute('homepage');
                    return new Response('carte ajoutée avec l\'id'.$cartes->getIdCarte());

                }
            } 
            
            $formView = $form -> createView(); // créer les champs liés

            $params = array(
                'cartesForm' => $formView,
                'title' => 'Formulaire d\'ajout de cartes'
            );

            return $this->render('@WF3WRT/Cartes/ajout.html.twig', $params);
        }


        /**
         *   
         * @Route("/cartes/", name="cartes")
         */
        public function indexAction()
        {
            $repository = $this -> getDoctrine() -> getRepository(Cartes::class);
            $cartes = $repository -> findAll();
            
            $params = array(
                'cartes'=> $cartes,
                'title' => 'Affichage des données des cartes'
            );

            return $this->render('@WF3WRT/Cartes/cartes.html.twig', $params);
            
        }


   // Coordonnées en JSON
   public function getCoor($element){
    $coor_parse = array();
    $i = 0; 
    foreach($element -> getCoordonnees() as $coor){
        $coor_parse[$i]['lat'] = $coor -> getLatitude();
        $coor_parse[$i]['lng'] = $coor -> getLongitude();
        $i ++; 
    }

    return json_encode($coor_parse);
}

/**
 *   
 * @Route("/carte/{id}", name="carte")
 */
public function carteAction($id)
{
    // $repository = $this -> getDoctrine() -> getRepository(Cartes::class);
    // $cartes = $repository -> find($id);

    $carte = $this -> getDoctrine() -> getManager() -> find(Cartes::class, $id);
    //$user = $carte -> getUser();
    
    $coor_json = $this->getCoor($carte);

    

    $params = array(
        'coordonnees' => $coor_json,
        'carte'=> $carte,
        'title' => 'Affichage des données des cartes'
    );
    // echo '<pre>';
    // debug::dump($carte);
    // debug::dump($user);
    // echo '</pre>';
    // return new Response('ok');

    
    return $this->render('@WF3WRT/Cartes/carte.html.twig', $params);
}


    // /**
    //  * 
    //  *@Route("/carte/delete/{idCartes}", name="deleteCarte") 
    //  */
    // public function deleteCarteAction($idCartes){
    //     $em = $this -> getDoctrine() -> getManager();
    //     $carte = $em -> find(Cartes::class, $idCartes);
        
    //     $em -> remove($carte);
    //     $em -> flush();

    //     return new Response("OK pour la suppression");
    //     //Url à tester: localhost:8000/delete/5
    // }

    /**
         *   
         * @Route("/user/{id}", name="userCarte")
         */
        public function userCarteAction($id)
        {

            $user = $this -> getDoctrine() -> getManager() -> find(User::class, $id);

            $repository = $this -> getDoctrine() -> getRepository(User::class);
            $cartes = $repository -> findBy(array('id' => $user));

        
            
            $params = array(
                'user' => $user,
                'cartes'=> $cartes,
                'title' => 'Affichage des cartes d\'un utilisateur'
            );
            // echo '<pre>';
            // debug::dump($user);
            // debug::dump($cartes);
            // echo '</pre>';
            // return new Response('ok');
            return $this->render('@WF3WRT/User/show.html.twig', $params);
        }




}

