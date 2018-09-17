<?php
		include('database.php');
		session_start();
		$address=$_POST['Address'].','.$_POST['locality'].','.$_POST['city'].', pincode:'.$_POST['pincode'];
		$userId=$_SESSION['id'];
		$items=json_encode($_SESSION['cart']);
		$result=mysqli_query($con,"INSERT INTO sales(userID,item,address) VALUES('$userId','$items','$address')");
		foreach ($_SESSION['cart'] as $key => $value) {
			$resultt=mysqli_query($con,"SELECT * FROM tablets WHERE id='$key' ");
			if(mysqli_num_rows($resultt)!=0){ 
		            $row_s=mysqli_fetch_array($resultt); 
		            $noOfTablets=$row_s["noOfTablets"];		            
		        }
		    $count=$noOfTablets-$_SESSION['cart'][$key]['quantity'];
			$resultu=mysqli_query($con,"UPDATE tablets SET noOftablets='$count' WHERE id='$key'");
		}
		


		if (!$result) {
?>
			<script>
				alert("Sorry our database is not linked correctly");
				window.location="/MedicalManagementSystem/";
			</script>
<?php
		}		
		else{
			unset($_SESSION['cart']);
?>
			<script>
				alert('Your order has been successfully Placed');
				window.location="/MedicalManagementSystem/";
			</script>
<?php
		}
?>