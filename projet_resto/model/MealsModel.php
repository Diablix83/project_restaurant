<?php
	class MealsModel extends Model{
		protected $table = 'meals';

		public function allTypes(){
			return $this->db->query('SELECT * FROM meals_types')->fetchAll();
		}

		public function allByTypes($type){
			$request = $this->db->prepare("SELECT *
					FROM $this->table
					INNER JOIN 
					WHERE");

			if(!empty($where)){	$sql .= " WHERE $where"; }
			if(!empty($order)){	$sql .= " ORDER BY $order"; }

			return $this->db->query($sql)->fetchAll();
		}
	}
?>