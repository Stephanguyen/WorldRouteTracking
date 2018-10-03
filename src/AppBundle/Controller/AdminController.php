<?php 



namespace AppBundle\Controller;

use WF3\WRTBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\RegistrationType;
use AppBundle\Form\UserType;

class AdminController extends Controller{

          /**
         * 
         * @Route("/admin/users/show", name="adminUser")
         */

        public function usersShowAction()  {
            $users = $this -> getDoctrine() -> getRepository(User::class) -> findAll();

		$params = array(
			'users' => $users,
			'title' => "Gestion des Membres"
		);

		return $this -> render('default/show.html.twig', $params);
        }

          /**
         * 
         * @Route("/admin/users/delete/{id}", name="deleteUser")
         */

        public function membreDeleteAction($id)  {
            return $this->redirectToRoute('adminUser');
        }


        /**
         * 
         * @Route("/admin/users/update/{id}", name="updateUser")
         */

        public function membreUpdateAction($id)  {
            return $this->render('default/form.html.twig');
        }

}

?>