<?php
	abstract class Model{
		protected $db;
		protected $table;

		public function __construct(){
			$this->db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8',
				'root',
				'troiswa',
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]);
		}

		public function all($where = null, $order = null){
			$sql = "SELECT * FROM $this->table";

			if(!empty($where)){	$sql .= " WHERE $where"; }
			if(!empty($order)){	$sql .= " ORDER BY $order"; }

			return $this->db->query($sql)->fetchAll();
		}

		public function find($id){
			$request = $this->db->prepare("SELECT * FROM $this->table WHERE $this->table.id = :id");
			$request->execute([
					":id" => $id
				]);
			return $request->fetch();
		}

		public function save($data){
			if(!empty($data['id'])){ $sql = "UPDATE $this->table SET "; }
			else{ $sql = "INSERT INTO $this->table SET "; }
			
			$sqlExe = [];

			foreach ($data as $key => $value) {
				$sql .= "$key = :$key, ";
				$sqlExe[":$key"] =  $value;
			}

			$sql = substr($sql, 0, strlen($sql)-2);
			if(!empty($data['id'])){ $sql .= " WHERE id = :id"; }

			$request = $this->db->prepare($sql);
			$request->execute($sqlExe);
		}

		public function delete($id){
			$request = $this->db->prepare("DELETE FROM $this->table WHERE $this->table.id = :id");
			$request->execute([
				":id" => $id
			]);
		}
	}
?>