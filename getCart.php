<?php
	require('MedkartAPI.php');
    session_start();
    $medkartAPI = new MedkartAPI();
	if(isset($_GET['q']) && $_GET['q']=="update"){
		$medkartAPI->updateCart($_GET["id"],$_GET["quantity"]);
	}
	else if(isset($_GET['q']) && $_GET['q']=="delete"){
		$medkartAPI->removeFromCart($_GET["id"]);
	}
	if(isset($_SESSION["cart"])){
		$cart = $_SESSION["cart"];
		echo '<div class="col-sm-7" id="cart" style="margin: 0; padding: 10px 7px 0 0;text-transform: capitalize;">';
	    echo '<div style="width:100%;height100%;">';
	    echo '<div style="width: 100%; height: 50px; border-bottom: 0.5px solid rgba(0,0,0,.2); padding: 10px;">';
	    echo '<h5 style="font-family: "Roboto", sans-serif;top: 0; bottom: 0; margin: 0 auto; font-weight: bold;">MY CART ('.count($_SESSION["cart"]).')</h5>';
	    echo '</div>';
		foreach ($cart as $key => $value) {
			
		    echo '<div style="width:100%; height:150px; padding:20px; border-bottom: 0.5px solid rgba(0,0,0,.2);">';
		    echo '<h4>'.$value['tbName'].'</h4>';
		    echo '<p id="quantity'.$value['cartId'].'" style="margin:0;">Quantity: '.$value['quantity'].'</p>';
		    echo '<p id="cost'.$value['cartId'].'" style="margin:0;">Cost: '.$value['quantity']*$value['cost'].'₹</p>';

		    echo "<div style='height:24px; display:inline-block; box-shadow:0 0 0 0; margin:10px 0 0 0;'>";
		   	echo '<div style="float: left;display: inline; height:24px; box-shadow:0 0 0 0; margin:0 0 0 0; width:150px; ">';
	        echo '<a href style="height:24px;" onclick="return updateCart('.$value['cartId'].',-1,-1,'.$value['cartId'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-minus-circle"></i></a>';
	        echo '<input style="text-align: center; margin: 0 10px 0 10px; padding: 0; height: 24px; width: 36px; position: relative; border-radius:2px; border:.5px solid #4D4D4D; top:-4px;" onkeyup="updateCart('.$value['cartId'].',this.value,0,'.$value['cartId'].');" id="cartId'.$value['cartId'].'" value="'.$value['quantity'].'">';
	        echo '<a href style="height:24px;" onclick="return updateCart('.$value['cartId'].',1,1,'.$value['cartId'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-plus-circle"></i></a>';
	        // echo '<a href="" style="height:24px" onclick="return increaseCount(this,1);"><img style="height:36px;" src="./plus-cart.svg"></a>';
	        echo '</div>';
	        echo "<div style='float:left; height:24px; box-shadow:0 0 0 0;'>";
	        echo "<p style='font-family: 'Roboto', sans-serif; font-weight: bold; margin-top:40px;' >REMOVE</p>";
	        echo "</div>";
		    echo "</div>";
		    echo '</div>';
		}
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-5" id="cartSummary" style="margin: 0; padding:10px 0 0 7px;">';
	    echo '<div style="width: 100%; height: 50px; border-bottom: 0.5px solid rgba(0,0,0,.2); padding: 10px;">';
	    echo '<h5 style="color:#878787; font-family: "Roboto", sans-serif; font-weight: bold;" >PRICE DETAILS</h5>';
	    echo '</div>';
	    echo '<div style="width:100%; height:200px; padding:20px; box-shadow:0 0 0 0;">';
	    echo "<div style='height:40px; box-shadow:0 0 0 0;'>";
	    echo '<p style="float:left; margin:0;">Price (7 items)</p>';
		echo '<p style="float:right; margin:0;">₹1499</p>';
	    echo "</div>";
	    echo "<div style='height:40px; box-shadow:0 0 0 0; border-bottom:.5px dashed #4D4D4D;'>";
	    echo "<p style='float:left;'>Delivery Charges</p>";
		echo "<p style='float:right; color:green;'>FREE</p>";
	    echo "</div>";
	    echo "<div style='height:40px; box-shadow:0 0 0 0; margin-top:20px;'>";
	    echo "<p style='float:left;'>Amount Payable</p>";
	    echo "<p style='float:right;'>Amount Payable</p>";
	    echo "</div>";
	    echo '</div>';
	    echo '</div>';
	}else{

	}
	
?>
<!-- echo "<div style='display:inline-block;'>";

echo "</div>";
echo "<div style='display:inline-block;'>";
echo "<p style='float:left;'>Delivery Charges</p>";
echo "<p style='float:right; color:green;'>FREE</p>";
echo "</div>"; -->