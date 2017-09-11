<?php
	class MealsModel extends Model{
		protected $table = 'meals';

		public function allTypes(){
			return $this->db->query('SELECT * FROM meals_types')->fetchAll();
		}


		//ATTENTION !!! le contenu de $type dois être une chaine de caractère en minuscule (les "name" de chaque type sont en minuscule)
		public function allByTypes($type){
			$request = $this->db->prepare("SELECT meals.*, meals_types.name
					FROM $this->table
					INNER JOIN meals_types ON meals_types.id = meals.meal_type
					WHERE meals_types.name = :type");
			$request->execute([ ":type" => $type ]);

			return $request->fetchAll();
		}
	}
?>