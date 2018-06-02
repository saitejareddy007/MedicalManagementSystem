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
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body style="position: fixed;width: 100%;height: 100%;">
		<div id="header1" style="top: 0px;">
			<div style="float:left; width: 115px;margin: 10px;">
				<img style="width: 80px; height: 45px; padding: 18 5% 10% 20px;" src="mms.png">
			</div>
			<div style="float:left; width: 500px;">
				<p style="font-size:24px; text-shadow: 2px 2px 2px black; color: white;" >Medical Management System
				</p>
			</div>
			<div style="float:right; padding: 30px; margin-right: 20px; font-size: 18px;">
				<a href="logout.php" style=" color: #337ab7; text-decoration: none;"><b>Logout</b></a>
	        </div>
		</div>
		<div id="obody" style="margin-top: 120px;">
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