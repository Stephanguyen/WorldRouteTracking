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





class AdminController extends Controller{
    

        /**
         * 
         * @Route("/admin/cartes/show", name="adminCartes")
         */

        public function cartesShowAction()  {

            $cartes = $this -> getDoctrine() -> getRepository(Cartes::class) -> findAll();

            $params = array(
                'cartes' => $cartes,
                'title' => "Gestion des Cartes"
            );
            
            return $this->render('@WF3WRT/Admin/Carte/show.html.twig', $params);
        }

        /**
         * 
         * @Route("/admin/carte/delete/{id}", name="deleteCarteAdmin")
         * 
         */

    	public function carteDeleteAction($id, Request $request){

		$em = $this -> getDoctrine() -> getManager();
        $carte = $em -> find(Cartes::class, $id);
        

        
        foreach($carte -> getCoordonnees() as $coor){
            $em -> remove($coor);
        }
        $em -> remove($carte);
		$em -> flush();

		$session = $request -> getSession();
		$session -> getFlashBag() -> add('success', 'La carte N°' . $id . ' a bien été supprimé');


		return $this -> redirectToRoute('adminCartes');
	}

    

    /**
     * 
     * @Route("/admin/user/delete/{id}", name="deleteuser")
     */

    public function userDeleteAction($id, Request $request)  {

        $em = $this -> getDoctrine() -> getManager();
        $user = $em -> find(User::class, $id);
        

        
        foreach($user -> getCartes() as $ca){
            $em -> remove($ca);
        }
        $em -> remove($user);
		$em -> flush();

		$session = $request -> getSession();
		$session -> getFlashBag() -> add('success', 'Le membre N°' . $id . ' a bien été supprimé');


        return $this->redirectToRoute('adminUser');
    }


    /**
     * 
     * @Route("/admin/users/show", name="useradmin")
     */

    public function userShowAction()  {
        $users = $this -> getDoctrine() -> getRepository(User::class) -> findAll();

        $params = array(
            'users' => $users,
            'title' => "Gestion des Membres"
        );

    return $this -> render('@WF3WRT/Admin/User/show.html.twig', $params);
    }


}

    

?>