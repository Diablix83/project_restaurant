<?php
	class MealsController extends Controller {
		public $model;
		public $modelName = 'meals';

		public function __construct(){
			$this->model = new $this->modelName();
		}
		
		public function all(){
			$users = $this->model->all();
			require_once('views/client/carte.php');
		}
		
	}
?>