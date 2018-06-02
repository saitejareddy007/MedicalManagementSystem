<?php
	include 'database.php';
	session_start();
	if(!isset($_SESSION['id'])){
		header('location: /MedicalManagementSystem');
	}
	$fullName=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>MMS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="hheader1">
		<div>
			<h2>Welcome <?php echo $fullName; ?></h2>
		<div>
		<div id="cart" >
			<a style="color: #1da1f2; text-decoration: none;" href="logout.php"><b>Logout</b></a>
		</div>
    </div>
	<div id="obody">
		<h1>Delivery Address</h1>
		<div style="margin: 0 auto; width: 50%;">
			<form method="post" action="placeorder.php" >
				<table style="width: 100%">
					<tr>
						<td><input style="width:100%;" type="text" name="city" placeholder="city"></td>
					</tr>
					<tr>
						<td><input style="width:100%;" type="text" name="locality" placeholder="area or locality"></td>
					</tr>
					<tr>
						<td><input style="width:100%;" type="text" name="Address" placeholder="address"></td>
					</tr>
					<tr>
						<td><input style="width:100%;" type="text" name="pincode" placeholder="pincode"></td>
					</tr>
					<tr>
						<td><button >Place Order</button></td>
					</tr>
				</table>
			</form>
		</div>	
	</div>  
</body>
</html>
<?php
	function order()
	{
		$address=$_POST['Address'].','.$_POST['lacality'].','.$_POST['city'].', pincode:'.$_POST['pincode'];
		$userId=$_SESSION['id'];
		$items=json_encode($_SESSION['cart']);
		
		$result=mysqli_query($con,"INSERT INTO sales(item,userID,adress) VALUES('$items','$userId','$address')");


		if (!$result) {
?>
		<script>
			alert("Sorry our database is not linked correctly");
			window.location="/MedicalManagementSystem/";
		</script>
<?php
		}		
		else{
?>
		<script>
			alert('Your order has been successfully Placed');
			window.location="/MedicalManagementSystem/";
		</script>
<?php
		}
	}
?>