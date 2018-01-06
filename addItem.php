<?php
	include 'database.php';
	session_start();
	if(isset($_POST['submit'])){ 
       	$k=0;
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
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
                	$k++;
            	}
            	else{
	                $_SESSION['cart'][$key]['quantity']=$val;
	                $k++;
	            }
            }
        }
        if ($k==0) {
        	unset($_SESSION['cart']);
        }
?>
<script type="text/javascript">
	window.location="/MedicalManagementSystem/cart.php"
</script>
<?php        
    
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