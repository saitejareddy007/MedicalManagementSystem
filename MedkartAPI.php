<?php
	include 'elasticSearch.php';
	class MedkartAPI{
		private $conn = null;

		public function __construct(){
			$this->conn = mysqli_connect("localhost","root","sai","MedicalManagementSystem");
			if(mysqli_connect_errno()){
				echo 'Failed to connect MySQL'.mysqli_connect_error();
			}
			$elasticSearch = new SearchElastic();
			$elasticSearch->InsertData($this->conn);
		}

		public function getDatabaseConnection(){
			return $this->conn;
		}

		public function authentication($username, $password){
			if ($username =="admin" && $password=="admin@cms"){
				return ["success","admin"];
			}
			$query = "SELECT id, username, fullName, contactNumber, authToken FROM user WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($this->conn, $query);
			$jsonResult = json_encode($this->convertToJSON($result)[0]);
			return [$jsonResult,"customer"];
		}

		public function validateAuthToken($id, $authToken){
			$query = "SELECT id FROM user WHERE id = '$id' AND authToken = '$authToken'";
			$result = mysqli_query($this->conn, $query);
			// return 0;
			return mysqli_fetch_assoc($result);
		}

		public function addToCart($userId, $itemId){
			$query = "INSERT INTO cart(userId, itemId) VALUES('$userId', '$itemId')";
			mysqli_query($this->conn,$query);
			return true;
		}

		public function updateCart($id, $quantity){
			$query = "UPDATE cart SET quantity = '$quantity' WHERE id = '$id'";
			mysqli_query($this->conn,$query);
			return true;
		}

		public function removeFromCart($id){
			$query = "DELETE FROM cart WHERE id = '$id'";
			mysqli_query($this->conn,$query);
			return true;
		}

		public function getCart($userId){
			$cartUserId = "cart.userId";
			$cartId = "cart.id";
			$query = "SELECT cart.id as cartId, tablets.id, tablets.tbName, tablets.cost, cart.quantity FROM tablets,cart WHERE cart.userId='$userId' and cart.itemId=tablets.id";
			$result = mysqli_query($this->conn,$query);
			return json_encode($this->convertToJSON($result));
		}

		public function confirmOrder($items,$userId,$address){
			
			mysqli_query($this->conn,"INSERT INTO sales(item,userId,address) VALUES('$items','$userId','$address')");
			return true;
		}

		public static function convertToJSON($result){
			if (!$result && mysqli_num_rows($result)==0){
				return null;
			}
			$rows = array();
			$counter = 0;
			while($r = mysqli_fetch_assoc($result)){
    			$rows[$counter] = $r;
    			$counter+=1;
    		}
			return $rows;
		}

	}
?>