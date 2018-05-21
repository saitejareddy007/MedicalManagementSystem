<?php
	include 'database.php';
	session_start();
	if(!isset($_SESSION['id'])){
		header('location: /MedicalManagementSystem/');
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<style type="text/css">
	#logout{
		float: right;	
	}
	
	#cart_content{
		margin:0 auto;
		border: solid 1px black;
		background: lightgrey;
		opacity:0.90;
	  	-moz-opacity:.50; 
	  	filter:alpha(opacity=50);
		box-shadow: 10px 10px 100px;
		width: 50%;
		height: 90%;
		margin-top: 100px;
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
		<link rel="icon" type="image/x-icon" href="logo.png">
		<script type="text/javascript" src="script.js"></script>
		<title>MMS</title>
	</head>
	
<body>
	<div id="header1" style="top: 0px;">
		<div style="float:left; width: 115px;">
			<img style="width: 80px; height: 45px; padding: 18 5% 10% 20px;" src="mms.png">
		</div>
		<div>
			<p style="font-size:24px; text-shadow: 2px 2px 2px black; color: white;" >Medical Management System
			</p>
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
</body>
</html>