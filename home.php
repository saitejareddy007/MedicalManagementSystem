<?php
	include "database.php";
	if(!isset($_SESSION['id'])){
		header("location: /MedicalManagementSystem");
	}
	$username=$_SESSION['username'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
	$row= mysqli_fetch_array($result);
	$fullName=$row['username'];
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/x-icon" href="logo.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="script.js"></script>
		<title>MMS</title>
	</head>
<body>
	<div id="header1">
		<div style="width: 200px;float: left; margin-left: 20px;">
			<h2>Welcome <?php echo $fullName; ?></h2>
		</div>
		<div style="float: right; padding: 30px;margin-right: 20px; font-size: 18px;">
			<a href="logout.php" style="text-decoration: none;"><b>Logout</b></a>
        </div>
		<div id="cart" style="margin: 0 auto; margin-right: 40px; padding: 30px; font-family: bold;">
			<a href="cart.php">
          		<span style="width: 100%; font-size: 18px; height: 100%;" class="glyphicon glyphicon-shopping-cart"><b>Items</b></span>
          	</a>
        </div> 
	</div>
	<div id="body" style="text-align: center;">
		<div id="hbodypart1">
			<input type="search" onchange="showTablets(this.value)" name="tabletSearch" placeholder="Search the medicine">
		<div id="tabletList"></div>	
		</div>
	</div>
</body>
</html>

