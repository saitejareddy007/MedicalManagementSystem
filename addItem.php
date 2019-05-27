<?php
	include 'database.php';
	include 'MedkartAPI.php';
	$medkartAPI = new MedkartAPI();

	session_start();
	if(isset($_GET['action'])&&$_GET['action']=='delete'){ 
       	$k=0;
       	echo $_SESSION['cart'][$_GET['quantity']]['price']*$_SESSION['cart'][$_GET['quantity']]['quantity'];

        unset($_SESSION['cart'][$_GET['quantity']]);
        $medkartAPI->removeFromCart($_GET['quantity']);
        if(count($_SESSION['cart'])==0){
        	unset($_SESSION['cart']);
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='quantityChanged'){ 
    	$key = $_GET['id'];
    	$val = $_GET['quantity'];
        $maxQ=mysqli_query($con,"SELECT * FROM tablets WHERE id='$key'");
    	if(mysqli_num_rows($maxQ)!=0){ 
            $row_s=mysqli_fetch_array($maxQ); 
            $noOfTablets=$row_s["noOfTablets"];
        }
    	if ($val>$noOfTablets) {
			?>
				<script type="text/javascript">
					var val =<?php echo $noOfTablets; ?>;
					alert("Sorry for the inconvenience we have only limited stock "+val+" for the medicine you have choosen");
				</script>
			<?php            		
    		$_SESSION['cart'][$key]['quantity']=$noOfTablets;
    		$medkartAPI->updateCart($key, $noOfTablets);
    	}
    	else{
            $_SESSION['cart'][$key]['quantity']=$val;
            $medkartAPI->updateCart($key, $val);
        }
        echo $_SESSION['cart'][$_GET['id']]['price'];
    }

    if (isset($_GET['q'])) {
		$id=$_GET['q'];
		
		if(isset($_SESSION['cart'][$id])){    
	            $_SESSION['cart'][$id]['quantity']++; 
	    }
	    else{ 
	        $query="SELECT * FROM tablets WHERE id={$id}"; 
	        $result=mysqli_query($con,$query);
	        $medkartAPI->addToCart($_SESSION["id"], $id);
	        if(mysqli_num_rows($result)!=0){ 
	            $row_s=mysqli_fetch_array($result); 
	              
	            $_SESSION['cart'][$row_s['id']]=array( 
	            		"tbName" => $row_s['tbName'],
	                    "quantity" => 1, 
	                    "price" => $row_s['cost'] 
	                );
	        }else{ 
	              
	            $message="This product id is invalid!"; 
	              
	        } 
	              
	    }
	}        
?>