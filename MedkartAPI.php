<?php
	class MedkartAPI{

		private $con = null;

		public function __constructor(){
			$this->conn = mysqli_connect("localhost","root","sai","MedicalManagementSystem");
			if(mysqli_connect_errno()){
				echo 'Failed to connect MySQL'.mysqli_connect_error();
			}
		}

		public function authentication($username, $password){
			$query = "SELECT id, username, fullName, contactNumber, authToken FROM user WHERE username = ".$username." AND password = ".$password;
			$result = mysqli_query($this->conn,$query);
			return convertToJSON($result);
		}

		public function addToCart($userId, $itemId, $quantity){
			$query = "INSERT INTO cart(userId, itemId, quantity) VALUES(".$userId.", ".$itemId.", ".$quantity.")";
			mysqli_query($this->conn,$query);
			return true;
		}

		public function updateCart($id, $quantity){
			$query = "UPDATE cart SET quantity = ".$quantity." WHERE id = ".$id;
			mysqli_query($this->conn,$query);
			return true;
		}

		public function getCart($userId){
			$query = "SELECT * FROM cart";
			$result = mysqli_query($this->conn,$query);
			return convertToJSON($result);
		}

		public static function convertToJSON($result){
			if (mysqli_num_rows($result)==0)
				return null;
			$rows = array();
			while($r = mysqli_fetch_assoc($result))
    			$rows[] = $r;
			return json_encode($rows);
		}
	}
?>