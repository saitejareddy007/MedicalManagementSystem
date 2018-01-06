<?php
	include "database.php";
	session_start();
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
	<div id="hheader1">
		<div>
			<h2>Welcome <?php echo $fullName; ?></h2>
		<div>
		<div style="float: right;">
			<a href="logout.php">Logout</a>
        </div>
		<div id="cart" ><a href="cart.php">
          <span>Items</span><span style="width: 100%; height: 100%;" class="glyphicon glyphicon-shopping-cart"></span></a>
        </div> 
	</div>
	<div id="hbody">
		<div id="hbodypart1">
			<input type="search" onchange="showTablets(this.value)" name="tabletSearch" placeholder="Search the medicine">
		<div id="tabletList"></div>	
		</div>
	</div>
</body>
</html>

