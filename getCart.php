<?php
	require('MedkartAPI.php');
	session_start();
	
    $medkartAPI = new MedkartAPI();
    $conn = $medkartAPI->getDatabaseConnection();
	if(isset($_GET['q']) && $_GET['q']=="update"){
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['cartId']==$_GET["id"]) {
				$_SESSION['cart'][$key]["quantity"]=$_GET["quantity"];
			}
		}
		echo $_SESSION['cart'];
		$medkartAPI->updateCart($_GET["id"],$_GET["quantity"]);
	}
	else if(isset($_GET['q']) && $_GET['q']=="delete"){
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['cartId']==$_GET["id"]) {
				unset($_SESSION['cart'][$key]);
			}
		}
		
		echo json_encode($_SESSION['cart']);
		$medkartAPI->removeFromCart($_GET["id"]);
	}
	elseif (isset($_GET['q']) && $_GET['q']=="orders") {
		echo '<div style="width:100%;height100%;" id="cartHeader">';
	    echo '<div style="width: 100%; height: 50px; border: 0.5px solid rgba(0,0,0,.2); border-top-right-radius:2px; border-top-left-radius:2px; padding: 10px;">';
	    echo '<h5 style="font-family: "Roboto", sans-serif;top: 0; bottom: 0; margin: 0 auto; font-weight: bold;">MY ORDERS</h5>';
	    echo '</div>';
	    echo "<div style='padding:10px; height:500px; background:white;'>";
	    $userId = $_SESSION['id'];
	    $result = mysqli_query($conn,"SELECT * FROM sales WHERE UserId='".$userId."'");
		while($row	= mysqli_fetch_array($result)){
			echo "<div style='width:100%;height:50px; background:#e0e0e0; border-top-right-radius:2px;border-top-left-radius:2px;'>";
			echo "<button class='btn' style='background:white; color:#e8554e;' >ODI42094823890482903</button>";	
			echo "</div>";
			echo "<div id='orders_list_item' style='width:100%; background:white; border-bottom-left-radius:2px; border-bottom-right-radius:2px; border-left: 1px solid #e0e0e0; border-bottom: 1px dashed #e0e0e0; border-right: 1px solid #e0e0e0; padding:5px; overflow-y: scroll; '>";
			$total = 0;
			foreach (json_decode($row[2]) as $key => $value) {
				$tbresult = mysqli_query($conn,"SELECT tbName from tablets WHERE id=".$key);
				$tbrow = $tbresult->fetch_assoc();
				if(isset($value->price)){
					$price = $value->price;
				}
				else{
					$price = $value->cost;
				}
				echo $tbrow['tbName']." X ".$value->quantity." = ₹".($price*$value->quantity)."<br>";
				$total += ($price*$value->quantity);
			}
			echo "</div>";
			echo "<div style='height:50px; padding:10px; border-left: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; border-right: 1px solid #e0e0e0; margin-bottom:10px; border-bottom-right-radius:2px; border-bottom-left-radius:2px;'>";
			echo "<div style='float:left;'>";
			echo "<p style='color:#777;'>Ordered On: </p>";
			echo "</div>";
			echo "<div style='float:right;'>";
			echo "<p style='color:#777;'>Order Total: <b style='color:black';>₹".$total."</b></p>";
			echo "</div>";
			echo "</div>";
		}
		echo "</div>";
		
	}
	if(isset($_GET['q']) && $_GET['q']=="cart" && isset($_SESSION["cart"])){
		$cart = $_SESSION["cart"];
		
		echo '<div class="col-sm-7" id="cart">';
	    echo '<div style="width:100%;height100%;" id="cartHeader">';
	    echo '<div style="width: 100%; height: 50px; border: 0.5px solid rgba(0,0,0,.2); border-top-right-radius:2px; border-top-left-radius:2px; padding: 10px;">';
	    echo '<h5 style="font-family: "Roboto", sans-serif;top: 0; bottom: 0; margin: 0 auto; font-weight: bold;">MY CART (<b class="cartCountValue">'.count($_SESSION["cart"]).'</b>)</h5>';
	    echo '</div>';
	    $totalCost = 0;
	    echo "<div style='max-height:450px; width:100%; overflow-y:scroll; background:white; padding:0; border-right: 1px solid rgba(0,0,0,.2); border-left: 1px solid rgba(0,0,0,.2); border-radius:0px;' >";
	    $cartCount = count($_SESSION["cart"]);
	    $tempCartCount = $cartCount;
		foreach ($cart as $key => $value) {
			if($tempCartCount==1){
				echo '<div class="tabInCart" style="width:100%; height:150px; padding:20px; ">';
			}else{
				echo '<div class="tabInCart" style="width:100%; height:150px; padding:20px; border-bottom: 0.5px solid rgba(0,0,0,.2); ">';
			}
			$tempCartCount-=1;
			$totalCost+=$value['quantity']*$value['cost'];
		    
		    echo '<h4>'.$value['tbName'].'</h4>';
		    $cartId = $value['cartId'];
		    echo '<p id="quantity'.$cartId.'" style="margin:0;">Quantity: '.$value['quantity'].'</p>';
		    echo '<p id="cost'.$cartId.'" class="cost" style="margin:0;" value="678">Cost: '.$value['quantity']*$value['cost'].'₹</p>';

		    echo "<div style='height:24px; display:inline-block; box-shadow:0 0 0 0; margin:10px 0 0 0;'>";
		   	echo '<div style="float: left;display: inline; height:24px; box-shadow:0 0 0 0; margin:0 0 0 0; width:150px; ">';
	        echo '<a href style="height:24px;" onclick="return updateCart('.$cartId.',-1,-1,'.$value['cost'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-minus-circle"></i></a>';
	        echo '<input style="text-align: center; margin: 0 10px 0 10px; padding: 0; height: 24px; width: 36px; position: relative; border-radius:2px; border:.5px solid #4D4D4D; top:-4px;" onchange="changeValue(this)" onkeydown = "getValue(this)" onkeyup="updateCart('.$cartId.',this.value,0,'.$value['cost'].');" id="cartId'.$cartId.'" value="'.$value['quantity'].'">';
	        echo '<a href style="height:24px;" onclick="return updateCart('.$cartId.',1,1,'.$value['cost'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-plus-circle"></i></a>';
	        // echo '<a href="" style="height:24px" onclick="return increaseCount(this,1);"><img style="height:36px;" src="./plus-cart.svg"></a>';
	        echo '</div>';
	        echo "<div style='float:left; height:24px; box-shadow:0 0 0 0;'>";
	        echo "<p id='removeItem".$cartId."' style='font-family: 'Roboto', sans-serif; font-weight: bold; margin-top:40px;  ><span class='removeItem'>REMOVE</span></p>";
	        echo "</div>";
		    echo "</div>";
		    echo '</div>';
		}
		echo "</div>";
		echo "<div id='cartFooter' style='width:100%; background:white; border-bottom-right-radius:2px;border-bottom-left-radius:2px; padding:10px;border: 0.5px solid rgba(0,0,0,.2); border-top: 1px solid #f0f0f0; box-shadow: 0 -2px 10px 0 rgba(0,0,0,.1);box-sizing: border-box;position:sticky;' id='parent'>";
		echo "<button class='btn child' onclick='location.href=\"/MedicalManagementSystem/checkout.php\"' style='color:white; font-size:20px; font-weight:bold; background: #e8554e; border-radius:2px; width:200px;float:right;' >";
		echo "<span>PLACE ORDER</span>";
		echo "</button>";
		echo "<button class='btn child' onclick='location.href=\"/MedicalManagementSystem/\"' style='color:black; font-size:20px; font-weight:bold; background:white; border-radius:2px;float:right;'>";
		echo "<svg width='16' height='12' viewBox='0 0 16 27' xmlns='http://www.w3.org/2000/svg' ><path d='M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z' fill='#000'></path></svg>";
		echo "<span>Continue shopping</span>";
		echo "</button>";
		echo "</div>";
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-5" id="cartSummary">';
		echo "<div style='border: 1px solid rgba(0,0,0,.2); height:250px;'>";
	    echo '<div style="width: 100%; height: 50px; border-bottom: 0.5px solid rgba(0,0,0,.2); padding: 10px;">';
	    echo '<h5 style="color:#878787; font-family: "Roboto", sans-serif; font-weight: bold;" >PRICE DETAILS</h5>';
	    echo '</div>';
	    echo '<div style="width:100%; height:150px; padding:20px; box-shadow:0 0 0 0;">';
	    echo "<div style='height:40px; box-shadow:0 0 0 0;'>";
	    echo '<p id="cartCount" style="float:left; margin:0;">Price (<b class="cartCountValue">'.$cartCount.'</b> items)</p>';
		echo '<p id="totalCost" style="float:right; margin:0;">₹'.$totalCost.'</p>';
	    echo "</div>";
	    echo "<div style='height:40px; box-shadow:0 0 0 0; border-bottom:.5px dashed #4D4D4D;'>";
	    echo "<p style='float:left;'>Delivery Charges</p>";
		echo "<p style='float:right; color:green;'>FREE</p>";
	    echo "</div>";
	    echo "<div style='height:40px; box-shadow:0 0 0 0; margin-top:20px;'>";
	    echo "<p style='float:left;'>Amount Payable</p>";
	    echo '<p id="amountPayable" style="float:right;">₹'.$totalCost.'</p>';
	    echo "</div>";
	    echo '</div>';
	    echo "</div>";
	    echo '</div>';
	}else{
		return "Invalid Request";
	}
	
?>

