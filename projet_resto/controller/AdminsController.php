<?php
	class AdminsController extends Controller {
		protected $modelName = 'AdminsModel';

		public function connexion(){
			$email = $_POST['admin_email'];
			$password = $_POST['admin_password'];
			$verification = $this->model->findByEmail($email);
			if(!empty($verification)){
				if($verification['password'] == $password){
					$_SESSION['user']['email'] = $verification['email'];
					if(!empty($verification['status_admin'] && ($verification['status_admin'] == 1))){
						$_SESSION['user']['status_admin'] = true;
					}
					else{ $_SESSION['user']['status_admin'] = false; }

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

		public function reserver(){
			$missingField = false;
			foreach ($_POST as $key => $value) {
				if(empty($value)) $missingField = true;
			}

			if(!$missingField){
				$firstName = $_POST['clientFirstName'];
				$lastName = $_POST['clientLastName'];
				$nb_personnes = $_POST['nbPersonnes'];
				$email = $_POST['clientEmail'];
							
				$date_wished = $_POST['date'].' '.$_POST['heure'];
	
				$reservationsModel = new ReservationsModel();
				$reservationsModel->save([
						"firstName" => $firstName,
						"lastName" => $lastName,
						"email" => $email,
						"date_wished" => $date_wished,
						"nb_personnes" => $nb_personnes
					]);
				header('location:index.php?controller=admins&task=reservationsList');
			}
			else{
				$message = "Veuillez remplir tous les champs afin de procéder à votre réservation";
				require_once('views/admin/reservations_liste.php');
			}
		}

		public function deleteReservation(){
			$reservationsModel = new ReservationsModel();
			$reservationsModel->delete($_GET['id']);
			header('location:index.php?controller=admins&task=reservationsList');
		}

		public function detailsProduct(){
			$mealsModel = new MealsModel();
			$mealsTypes = $mealsModel->allTypes();
			if(!empty($_GET['id'])){
				$id_product = $_GET['id'];
				$meal = $mealsModel->find($id_product);
				//var_dump($meal);
				if(!empty($meal)){
					require_once('views/admin/produit_details.php');
				}
				else{
					$notFind = true;
					require_once('views/admin/produit_details.php');
				}
			}
			else {
				require_once('views/admin/produit_details.php');

			}
		}

		public function deleteProduct(){
			$mealsModel = new MealsModel();
			$mealsTypes = $mealsModel->delete($_GET['id']);
			header('location:index.php?controller=admins&task=productList');
		}

		public function saveMeal(){
			if((!empty($_POST['photo']))
				&&(!empty($_POST['name']))
				&&(!empty($_POST['quantityInStock']))
				&&(!empty($_POST['buyPrice']))
				&&(!empty($_POST['salePrice']))
				&&(!empty($_POST['meal_type']))
				&&(!empty($_POST['description']))
				){
					$toSave = [];
					foreach ($_POST as $key => $value) {
						$toSave["$key"] = $value;
					}
					if(!empty($_GET['id'])){
						$toSave['id'] = $_GET['id'];
					}
					$mealsModel = new MealsModel();
					$mealsModel->save($toSave);
					header('location:index.php?controller=admins&task=productList');
			}
			else{
				if(!empty($_GET['id'])){
					header('location:index.php?controller=admins&task=detailsProduct&id='.$_GET['id']);				
				}else{
					header('location:index.php?controller=admins&task=detailsProduct');				
				}
			}
		}

		public function addCategory(){
			if(!empty($_POST['nameCategory'])){
				$mealsTypes = new MealsModel();
				$mealsTypes->addType($_POST['nameCategory']);
			}
			header('location:index.php?controller=admins&task=productList');
		}

		public function modifyCategory(){
			if(!empty($_POST['nameCategory'])){
				$mealsTypes = new MealsModel();
				$mealsTypes->modifyType($_POST['nameCategory'], $_GET['id']);
			}
			header('location:index.php?controller=admins&task=productList');
		}

		public function deleteCategory(){
			$mealsModel = new MealsModel();
			$mealsTypes = $mealsModel->deleteType($_GET['id']);
			header('location:index.php?controller=admins&task=productList');
		}

	}
?>