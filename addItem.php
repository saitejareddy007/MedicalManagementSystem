<?php
	include 'database.php';
	session_start();
	if(isset($_GET['action'])&&$_GET['action']=='delete'){ 
       	$k=0;
       	echo $_SESSION['cart'][$_GET['quantity']]['price']*$_SESSION['cart'][$_GET['quantity']]['quantity'];
        unset($_SESSION['cart'][$_GET['quantity']]);
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
    	}
    	else{
            $_SESSION['cart'][$key]['quantity']=$val;
        }
        echo $_SESSION['cart'][$_GET['id']]['price'];
    }

    if (isset($_GET['q'])) {
		$id=$_GET['q'];
		if(isset($_SESSION['cart'][$id])){    
	            $_SESSION['cart'][$id]['quantity']++; 
	    }
	    else{ 
	        $sql_s="SELECT * FROM tablets WHERE id={$id}"; 
	        $query_s=mysqli_query($con,$sql_s);

	        if(mysqli_num_rows($query_s)!=0){ 
	            $row_s=mysqli_fetch_array($query_s); 
	              
	            $_SESSION['cart'][$row_s['id']]=array( 
	                    "quantity" => 1, 
	                    "price" => $row_s['cost'] 
	                ); 
	              
	              
	        }else{ 
	              
	            $message="This product id it's invalid!"; 
	              
	        } 
	              
	    }
	}        
?>