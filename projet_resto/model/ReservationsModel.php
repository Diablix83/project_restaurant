<?php
	class ReservationsModel extends Model{
		protected $table = 'reservations';

		public function recupDernier(){
			return $this->db->lastInsertId();
		}

	}
?>