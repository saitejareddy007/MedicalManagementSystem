<?php
	include 'database.php';
	session_start();
	if(!isset($_SESSION['id'])){
		header('location: /MedicalManagementSystem/');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		body{
			padding: 0;
			margin: 0 auto;
			height: 800px;
			background-image: url("img.jpg");
			background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
			
		}
		#total{
			height: 100%;
			margin: 0 auto;

		}
		#logout{
			float: right;
			
		}
		#header1{	
			height:46px;
			margin: 0 auto;
			top:-15px;
			box-shadow:0px 0px 2px #888888;
			box-shadow: 10px 1px 10px;
			background:none;
			width: 80%;
			font-size:13px;
			height: 10%;
			position: relative;
			padding:0px 10% 0px 10%;
			
			list-style: none;
		}
		#cart_content{
			margin:0 auto;
			border: solid 1px black;
			background: lightgrey;
			opacity:0.90;
		  	-moz-opacity:.50; 
		  	filter:alpha(opacity=50);
			box-shadow: 10px 10px 1000px;
			width: 50%;
			height: 80%;
			border-radius: 10px;
		}
		#top_content{
			border-radius: 10px 10px 0px 0px;
			height:80%;
		}
		#top{
			height: 22%;

		}
		#topl{
			padding:0 1% 0 1%;
			border-radius: 10px 0px 0px 0px;
			float: left;
			height: 100%;
			width:68%;
			background: none;
		}
		#topr{
			padding-left: 1%;
			border-radius:0px 10px 0px 0px;
			float: right;
			width: 29%;
			height: 100%;
			background: none;
		}
		#top_left_content{
			overflow-y: scroll;
			padding:0 0.8% 0 1%;
			float: left;
			width:68%;
			height: 78%;
			background: none;
		}
		#top_right_content{
			padding-left: 1%;
			float: right;
			width: 29%;
			height: 78%;
			background: none;
		}
		#bottom_content{
			padding-left: 1%;
			border-radius: 0px 0px 10px 10px;
			height: 20%;
			background: none;
		}
		table { 
            width: 100%; 
            overflow-y:scroll;
        }
		th { 
            padding: 10px; 
            background-color: #48577D; 
            color: #fff; 
            text-align: left; 
        }
        td { 
            padding: 5px; 
        }
        tr { 
            background-color: #d3dcf2; 
        }        
	</style>
</head>
<body>
	<div id="total">
	<div id="header1">
		<div>
			<h2>MMS</h2>
		</div>
		<div id="logout">
		  	<a href="logout.php" style="text-decoration: none;"><b style="color: #1da1f2; ">Logout</b></a>
		</div>
	</div>
	<div id="cart_content">
		<div id="top_content">
			<div id="top">
				<div id="topl">
					<h1>View cart</h1> 
					<a href="home.php">Go back to products page</a>
				</div>
				<div id="topr">
					<h2>Cart Summary</h2> 
				</div>
			</div>
			<div id="top_left_content">
				
				<?php
				if(isset($_SESSION['cart'])){
				?>	
					<form id="formId" method="post" action="addItem.php"> 
					      
					    <table> 
					          
					        <tr> 
					            <th>Name</th> 
					            <th>Quantity</th> 
					            <th>Price</th> 
					            <th>Items Price</th> 
					        </tr> 
					          
					        <?php 
					          
					            $sql="SELECT * FROM tablets WHERE id IN ("; 
					                      
					                    foreach($_SESSION['cart'] as $id => $value) { 
					                        $sql.=$id.","; 
					                    } 
					                      
					                    $sql=substr($sql, 0, -1).") ORDER BY tbName ASC"; 
					                    $query=mysqli_query($con,$sql); 
					                    $totalprice=0; 
					                    while($row=mysqli_fetch_array($query)){ 
					                        $subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['cost']; 
					                        $totalprice+=$subtotal; 
					                    ?> 
					                        <tr> 
					                            <td><?php echo $row['tbName'] ?></td> 
					                            <td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
					                            <td><?php echo $row['cost'] ?>₹</td> 
					                            <td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['cost'] ?>₹</td> 
					                        </tr> 
					                    <?php 
					                          
					                    } 
					        ?> 
					                    <tr> 
					                        <td colspan="4">Total Price: <?php echo $totalprice."₹" ?></td> 
					                    </tr> 
					          
					    </table>  
					</form> 
				<?php	
				}else{
					echo "<p>You didnt added any medicine in the cart.</p>";
				}
				?>	

			</div>
			<div id="top_right_content">
				
				<?php 
				  	
				    if(isset($_SESSION['cart'])){ 
				          
				        $sql="SELECT * FROM tablets WHERE id IN ("; 
				          
				        foreach($_SESSION['cart'] as $id => $value) { 
				            $sql.=$id.","; 
				        } 
				          
				        $sql=substr($sql, 0, -1).") ORDER BY tbName ASC"; 
				        $query=mysqli_query($con,$sql); 
				        while($row= mysqli_fetch_array($query) ){ 
				              
				        ?> 
				            <p><?php echo $row['tbName'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity'] ?></p> 
				        <?php 
				              
				        } 
				    ?> 
				        <hr /> 
				        <button onclick="document.location.href='/MedicalManagementSystem/order.php';" >Check Out</button>
				    <?php 
				          
				    }else{ 
				          
				        echo "<p>Your Cart is empty. Please add some products.</p>"; 
				          
				    } 
				  
				?>
			</div>
		</div>	
		<div id="bottom_content">
			<br /> 
			    <button type="submit" form="formId" name="submit">Update Cart</button>
			<br /> 
			<p>To remove an item, set it's quantity to 0. </p>
		</div>
	</div>
	</div>
</body>
</html>