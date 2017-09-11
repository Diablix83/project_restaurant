<?php
	class ClientController extends Controller {
		protected $modelName = 'RegistredCustomersModel';

		public function accueil(){
			require_once('views/client/accueil.php');
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