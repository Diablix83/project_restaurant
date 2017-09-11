<?php
	class AdminsController extends Controller {
		protected $modelName = 'AdminsModel';

		public function connexion(){
			$email = $_POST['admin_email'];
			$password = $_POST['admin_password'];
			$verification = $this->model->findByEmail($email);
			if(!empty($verification)){
				if($verification['password'] == $password){
					$_SESSION['user'] = $verification['email'];
					header('location:index.php?controller=admins&task=productList');
				}
			}
			else header('location:index.php');
		}

		public function deconnexion(){
			$_SESSION['user'] = null;
			header('location:index.php');
		}

		public function productList(){
			$mealsModel = new MealsModel();
			$mealsTypes = $mealsModel->allTypes();
			$meals = $mealsModel->all();
			
			require_once('views/admin/produits_liste.php');
		}

		public function reservationsList(){
			$reservationsModel = new ReservationsModel();
			$reservations = $reservationsModel->all(null, 'date_wished DESC');
			
			require_once('views/admin/reservations_liste.php');
		}

	}
?>