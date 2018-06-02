<?php
	include 'database.php';

	if(isset($_POST['btn'])){
		$tbName		= $_POST['tbName'];
		$cost 		= $_POST['cost'];
		$noOfTablets= $_POST['noOfTablets'];
		$result=mysqli_query($con,"INSERT INTO tablets (tbName,cost,noOfTablets) VALUES ('$tbName','$cost','$noOfTablets')");

		if(!$result){
			echo "your database is not linked correctly";
?>
			<script type="text/javascript">
				alert('not done');
			</script>
<?php
		}
		else{
?>
			<script type="text/javascript">
				alert('tablet has been successfully added to your database');
			</script>
<?php			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		#bottom table { 
            width: 100%;
            overflow-y:scroll;
        }
		#bottom th { 
            padding: 10px; 
            background-color: #48577D; 
            color: #fff; 
            text-align: left; 
        }
        #bottom td { 
            padding: 5px; 
        }
        #bottom tr { 
            background-color: #d3dcf2; 
        }
		
		#header2{
			height:8%;
			box-shadow:0px 0px 2px #888888; 
			background:none;
			box-shadow: 1px 1px 10px;
			width: 100%;
			font-size:13px;
			position: relative;
			margin-top: 0px; 
			padding:0px 0px 0px 220px;
			list-style: none;
		}
		#main_content{
			margin: 0 auto;
			border-radius: 10px;
			width: 70%;
			position: relative;
			margin-top: 120px;
			background: none;
			height: 500px;
		}
		#left_main_content{
			float: left;
			width: 44.5%;
			padding-top: 5%;
			padding-left: 5%;
			height: 91%;
			border-radius: 10px;
			background: white;
			border:solid 1px;
		}
		#right_main_content{
			float:right;
			width: 45.5%;
			padding-top: 5%;
			padding-left: 2%;
			padding-right: 2%;
			height: 91%;
			border-radius: 10px;
			background: white;
			border:solid 1px;
		}
		#top{
			width:100%;
			height: 10%;
		}
		#bottom{
			overflow-y: scroll;
			width: 100%;
			height: 80%;
		}
	</style>
</head>
<body>
	<div id="header1" style="top:0;">
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
		 
	</div>
	<div id="main_content">
		<div id="left_main_content">
			<h1>You can add tablets from here</h1>
			<form action="adminPage.php" method="post" onsubmit="return validateForm()">
				<table>
					<tr>
						<td>
							<input type="text" name="tbName" placeholder="Enter the tablet name">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="cost" placeholder="Cost of the tablet">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="noOfTablets" placeholder="Quantity of the tablets">
						</td>
					</tr>
					<tr>
						<td>
							<button name="btn" type="submit" value="add tablet">add tablets</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="right_main_content">
			<div id="top">
				<h1>Sales</h1>
			</div>
			<div id="bottom">
				<?php
				$sales=mysqli_query($con,"SELECT * FROM sales");
				echo "<table>
				        <tr>
				            <th>Name</th>
				            <th>Items</th>
				            <th>Address</th>
				        </tr>";
				while($row=mysqli_fetch_assoc($sales)){
					$id=$row['userId'];
					$maxQ=mysqli_query($con,"SELECT * FROM user WHERE id='$id' ");
	            	if(mysqli_num_rows($maxQ)!=0){ 
			            $row_s=mysqli_fetch_array($maxQ);
			        }
			        echo "<tr>";
				    echo "<td>" . $row_s['fullName'] . "</td>";
				    $item[] = $row['item'];
				    echo "<td>";
				    foreach ($item as $key => $value) {
				    	# code...
				    	 echo $value;
				    }
				    echo "</td>";
				    echo "<td>" . $row['address'] . "</td>";
				    echo "</tr>";				
				}
				echo "</table>";
			?>
			</div>
			
		</div>
	</div>
</body>
</html>
