<?php
	abstract class Controller {
		protected $model;
		
		public function all(){
			$users = $this->model->all();
			require_once('views/users/liste.phtml');
		}

	}
?>