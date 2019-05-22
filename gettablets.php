<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
td{
	text-align: center;
}
th {
    background-color: #1da1f2;
    color: white;
    text-align: center;
    align-content: center;
    align-items: center;
    padding: 5px;
}
table tr { 
                background-color: #d3dcf2; 
            }
</style>
</head>
<body>

<?php
	include('database.php');

	$string=$_GET['q'];

	if($string = ""){
		$searchResult = mysqli_query($con,"SELECT * FROM tablets");
	}else{
		$searchResult = mysqli_query($con,"SELECT * FROM tablets WHERE tbName LIKE '%$string%' ");
	}
	
    
	while($row = mysqli_fetch_array($searchResult)) {
		$id=$row['id'];
		echo "<div class='col-lg-3 cardOuterPart'>";
  		echo "<div class='card' >";
    	echo "";
    	echo "<h4 style='color: #4D4D4D;text-transform: capitalize;'>". $row['tbName'] ."</h4>";
    	echo "<p style='padding: 0;margin: 0;'>Available strips: ". $row['noOfTablets'] ."</p>";
    	echo "<p style='padding: 0;margin: 0;'>Cost: ". $row['cost'] ."₹/tablet strip</p>";
    	echo "<div style='width: 100%; position:absolute; right:10px; bottom:10px;'>";
      	echo "<button class='button two' onclick='return addItem($id)'>Add to cart</button>";
    	echo "</div>";
  		echo "</div>";
			echo "</div>";
	}

	mysqli_close($con);

?>
</body>
</html>