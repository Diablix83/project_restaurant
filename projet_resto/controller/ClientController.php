<?php
	class ClientController extends Controller {
		protected $modelName = 'RegistredCustomersModel';

		public function accueil(){
			require_once('views/client/accueil.php');
		}

		public function inscription(){
			require_once('views/client/inscription.php');
		}

		public function addUser(){
			if((!empty($_POST['firstName']))
				&& (!empty($_POST['lastName']))
				&& (!empty($_POST['email']))
				&& (!empty($_POST['password']))
				&& (!empty($_POST['confirmpassword']))
				&& (!empty($_POST['postalCode']))
				&& (!empty($_POST['adress']))
				){
				if($_POST['password'] == $_POST['confirmpassword']){
					$toSave = [];
					foreach ($_POST as $key => $value) {
						$toSave["$key"] = $value;
					}

					unset($toSave['confirmpassword']);

					$clientModel = new $this->model();
					$clientModel->save($toSave);

					header('location:index.php?controller=client&task=seConnecter');
				}
				else{
					$message = "Attention à votre mot de passe !";
					require_once('views/client/inscription.php');
				}
			}
			else{
				$message = "Remplissez tous les champs";
				require_once('views/client/inscription.php');
			}
		}

		public function seConnecter(){
			require_once('views/client/connexion.php');
		}

		//A COMPLETER
		public function connexion(){
			$email = $_POST['client_email'];
			$password = $_POST['client_password'];
			$verification = $this->model->findByEmail($email);
			if(!empty($verification)){
				if($verification['password'] == $password){
					$_SESSION['user']['email'] = $verification['email'];
					$_SESSION['user']['name'] = ucfirst($verification['firstName']).' '.strtoupper($verification['lastName']);
					$_SESSION['user']['status_admin'] = false;

					header('location:index.php');
				}
			}
			else header('location:index.php');
		}

		public function carte(){
			$mealsModel = new MealsModel();
			$mealsTypes = $mealsModel->allTypes();
			$meals = $mealsModel->all();

			require_once('views/client/carte.php');
		}

		public function reservation(){
			require_once('views/client/reservations.php');
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
				$verif_id = $reservationsModel->recupDernier();
				$recapitulatif = $reservationsModel->find($verif_id);
				require_once('views/client/reserver.php');
			}
			else{
				$message = "Veuillez remplir tous les champs afin de procéder à votre réservation";
				require_once('views/client/reservations.php');
			}
		}


	}
?>