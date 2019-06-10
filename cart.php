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
	#cart_content{
		margin:0 auto;
		border: solid 1px black;
		background: lightgrey;
		opacity:0.90;
	  	-moz-opacity:.50; 
	  	filter:alpha(opacity=50);
		box-shadow: 10px 10px 100px;
		width: 60%;
		height: 80%;
		min-width: 400px;
		min-height: 520px;
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
		<script type="text/javascript">
	function remove(obj,tabletId) {
		var pos=60;
		obj.parentElement.parentElement.style.display="none";
		var id = setInterval(frame, 1);
  		function frame() {
		    if ( pos== 0) {
		      clearInterval(id);
		      obj.parentElement.parentElement.parentElement.style.display="none";
		    } else {
		      pos--; 
		      obj.parentElement.parentElement.parentElement.style.height = pos + 'px';
		    }
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
            	document.getElementById('tabletId'+tabletId).style.display="none";
            	var temp = document.getElementById('totalprice').innerHTML;
            	temp-=this.responseText;
            	if(temp==0)
            		location.reload();
            	else	
            		document.getElementById('totalprice').innerHTML=temp;

        	}
		};

        xmlhttp.open("GET","addItem.php?action=delete&quantity="+tabletId,true);
        xmlhttp.send();
		
		return false;
	}
	function increaseCount(obj,tabletId){
		var k = obj.previousSibling.value;
		obj.previousSibling.value=parseInt(obj.previousSibling.value)+1;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
        		var str = document.getElementById('tabletId'+tabletId).innerHTML;
        		str = str.split("").reverse().join("").replace(k.split("").reverse().join(""), obj.previousSibling.value.split("").reverse().join(""));
        		document.getElementById('tabletId'+tabletId).innerHTML=str.split("").reverse().join("");
        		var temp = document.getElementById('totalprice').innerHTML;
            	temp=parseInt(temp)+parseInt(this.responseText);
            	document.getElementById('totalprice').innerHTML=temp;
            	// alert(this.responseText);
        	}
		};
        xmlhttp.open("GET","addItem.php?action=quantityChanged&id="+tabletId+"&quantity="+parseInt(obj.previousSibling.value),true);
        xmlhttp.send();
		return false;
	}

	function decreaseCount(obj,tabletId){
		if(parseInt(obj.nextSibling.value)!=1){
			var k = obj.nextSibling.value;
			obj.nextSibling.value-=1;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
	        	if (this.readyState == 4 && this.status == 200) {
	            	// alert(this.responseText);
	            	var str = document.getElementById('tabletId'+tabletId).innerHTML;
	        		str = str.split("").reverse().join("").replace(k.split("").reverse().join(""), obj.nextSibling.value.split("").reverse().join(""));
	        		document.getElementById('tabletId'+tabletId).innerHTML=str.split("").reverse().join("");
	        		var temp = document.getElementById('totalprice').innerHTML;
		        	temp-=this.responseText;
		        	document.getElementById('totalprice').innerHTML=temp;
	        	}
			};
        	xmlhttp.open("GET","addItem.php?action=quantityChanged&id="+tabletId+"&quantity="+parseInt(obj.nextSibling.value),true);
        	xmlhttp.send();
		}
		return false;
	}
</script>
	</head>
	
<body style="font-family: 'Times New Roman', Times, serif;">
	<div id="header1" style="top: 0px;">
		<div style="float:left; width: 115px;">
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
	<div id="cart_content">
	<div id="top_content">
		<div id="top">
			<div id="topl">
				<h1 style="margin-bottom: 0px;">View cart</h1> 
				<a href="./home.php">Go back to products page</a>
			</div>
			<div id="topr">
				<h2>Cart Summary</h2> 
			</div>
		</div>

		<div id="top_left_content">
			<?php
			if(isset($_SESSION['cart'])){ 
				          
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

                <div id="cartItem" style="width: 90%; box-shadow: 1px 1px 10px gray; border-bottom: 1px solid gray; border-radius: 2px;height: 60px;background: white; padding: 10px;">
                	<div style="border-radius: 2px;height: 40px;">
                		<div style="float: left;">
                			<p style="font-weight: bold; margin: 0;"><?php echo $row['tbName'] ?></p>
                		</div>
                		<div style="float: right;">
                			<p style="font-weight: bold; margin: 0;">₹<?php echo $row['cost'] ?></p>

                		</div>
                	</div>
                	<div style="border-radius: 2px;height: 20px;">
                		<div style="float: left;">
                			<a href="" onclick="return remove(this,<?php echo $row['id'];?>)" style="text-align: center;  text-decoration: none;">
                				<img style="height:14px" src="./delete_icon.svg">
                				<span style="font-family: 'Courier New', Courier, monospace;  color: gray;" >Remove</span>
                			</a>
                		</div>
                		<div style="float: right;display: inline;">
                			<a href="" style="height:24px"><img style="height:100%" src="./minus-cart.svg"></a>
                			<input style=" text-align: center; margin: 0; padding: 0; height: 20px; width: 30px; position: relative; top: -7px;" name="quantity[<?php echo $row['id'] ?>]" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>">
                			<a href="" style="height:24px" onclick="return increaseCount(this,1);"><img style="height:100%" src="./plus-cart.svg"></a>
                		</div>
                		
                	</div>
                </div>
                <?php 
                      
                } 	
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
			        Total Price: <?php echo "₹".$totalprice ?><br>
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