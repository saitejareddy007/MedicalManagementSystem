<?php
	include "database.php";
	if(!isset($_SESSION['id'])){
		header("location: /MedicalManagementSystem");
	}

	
	//document.getElementById('cartCount').value = <?php echo $_SESSION['cart'].length();
	$username=$_SESSION['username'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
	$row= mysqli_fetch_array($result);
	$fullName=$row['username'];
?>
<html>
	<head>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="script.js"></script>
		<title>MMS</title>
	</head>
<body style="background: none;">
	<div id="header1">
		<div style="float:left; width: 115px;">
			<img style="width: 93%; height: 93%; padding: 18 5% 10% 20px;" src="mms.png">
		</div>
		<div>
			<p style="float:left; margin-top: 20px; font-size:24px; text-shadow: 2px 2px 2px black; color: white;" >Medical Management System
			</p>
		</div>
		<div style="float: right; padding: 30px;margin-right: 20px; font-size: 18px;">
			<a href="logout.php" style="text-decoration: none;"><b>Logout</b></a>
        </div>
		<div id="cart" style="margin: 0 auto; margin-right: 40px; padding: 30px; font-family: bold;">

			<a href="cart.php" style="display: inline-block;">
				<span style="display: inline-block; margin: 0;width: 80px;">
					<span style="font-size: 18px;" class="glyphicon glyphicon-shopping-cart"> </span>
					<span id = "cartCount" style="color: white; text-align: center;  min-width: 20px;height: 20px; border-radius: 10px;position: relative; background: red; position: absolute; bottom: 40px; right: 180px;padding: 2px;"></span>
					<span>  Items</span>
					
				</span>
          		
          	</a>
        </div> 
	</div>
	<div id="body" style="text-align: center;">
		<div>
			<h2>Welcome <?php echo $fullName; ?></h2>
		</div>
		<div id="hbodypart1">
			<input  type="search" onkeyup="showTablets(this.value)" name="tabletSearch" placeholder="Search the medicine">
			<div id="tabletList"></div>	
		</div>
	</div>
</body>
</html>
<?php
if(!isset($_SESSION['cart'])){
		?>
		<script type="text/javascript">
			document.getElementById('cartCount').style.visibility = "hidden";
		</script>
		<?php
}else{
	?>

		<script type="text/javascript">
			$sum=0;
			<?php 
				foreach ($_SESSION['cart'] as $key => $value):
					$sum=$value['quantity']+$sum;
				
			?>
				
			<?php endforeach ?>
			 document.getElementById('cartCount').innerHTML= <?php echo $sum; ?>;
		</script>
	<?php
}

?>