<?php
	class AdminsModel extends Model{
		protected $table = 'admins';
	
		public function findByEmail($email){
			$request = $this->db->prepare("SELECT *
				FROM $this->table WHERE $this->table.email = :email");
			$request->execute([ ":email" => $email ]);
			return $request->fetch();
		}
	}

?>