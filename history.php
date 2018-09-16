<?php
	include "database.php";
	session_start();
	$userId = $_SESSION['id'];
	$result = mysqli_query($con,"SELECT * FROM sales WHERE UserId='".$userId."'");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<title>MMS</title>
</head>
<body>
	<div id="header1">
		<div style="float:left; width: 115px;">
			<img style="width: 93%; height: 93%; padding: 18 5% 10% 20px;" src="mms.png">
		</div>
		<div>
			<p style="float:left; margin-top: 20px; font-size:24px; text-shadow: 2px 2px 2px black; color: white;" >Medical Management System
			</p>
		</div>

		<div style="float: right; text-align: center; display: inline-block; width: 400px; height: 100%;">
        	
        		<a href="history.php"><span style="margin: 25px; font-size: 18px;" class="glyphicon glyphicon-time">history</span></a>
        	
				<a href="cart.php" style="display: inline-block;">
					<span style="display: inline-block; margin: 25px;">
						<span style="font-size: 18px;" class="glyphicon glyphicon-shopping-cart"> </span>
						<span id = "cartCount" style="color: white; text-align: center;  min-width: 20px;height: 20px; border-radius: 10px;position: relative; background: red; position: absolute; bottom: 40px; right: 180px;padding: 2px;"></span>
						<span>  Items</span>
					</span>
	          	</a> 
				<a href="logout.php" style="text-decoration: none;margin: 25px;"><b>Logout</b></a>
			
		</div>
	</div>
	<div style="margin: 0 auto; margin-top: 150px; width: 80%; height: 400px; border-radius: 5px; border:1px solid grey;">
		<?php
			while($row	= mysqli_fetch_array($result)){
				$data = json_decode($row[2],true);
				echo $data["1"];
				$data = '['.ltrim($row[2],"{");
				$data = rtrim($data,"}").']';
				
				?>
				<script type="text/javascript">
					var k=<?php echo $row[2]; ?>;
					alert(JSON.stringify(k));
				</script>
				<?php
			}
		?>
	</div>
</body>
</html>