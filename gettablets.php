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
    session_start();
    $searchElastic = new SearchElastic();
	$string=$_GET['q'];
    $result = $searchElastic->Search($string);
    if($result['searchfound']==0){
        echo "<div class='col-lg-12'>";
        echo "<div style='width:50%; margin:0 auto; text-align:center; color:#4D4D4D;'>";
        echo "<img src='./icon_noresult.png' style='width:100%;'>";
        echo "<h3>No results found...</h3>";
        echo "</div>";
        echo "</div>";
        return;
    }
    foreach ($result["result"] as $key => $row) {
        $id=$row['_id'];
        echo "<div class='col-lg-3 cardOuterPart'>";
        echo "<div style='background-color:#D8C3A5;'>";
        echo "<div class='card' style='border-bottom-right-radius:500px;'>";
        echo "<h4 style='color: #4D4D4D;text-transform: capitalize;'>". $row["_source"]['tbName'] ."</h4>";
        echo "<p style='padding: 0;margin: 0;'>Available strips: ". $row["_source"]['noOfTablets'] ."</p>";
        echo "<p style='padding: 0;margin: 0;'>Cost: ". $row["_source"]['cost'] ."₹/tablet strip</p>";
        echo "<div style='width: 100%; position:absolute; right:10px; bottom:10px;'>";
        $cartUrl = 'location.href="./cart.php"';
        if (isset($_SESSION["cart"]) && in_array($id,array_keys($_SESSION["cart"]))){
            echo "<button class='button two goCartBtn' onclick='$cartUrl'>Go to cart</button>";
            echo "<button class='button two addCartBtn' style='display:none;' onclick='addItem($id)'>Add to cart</button>";
            
        }else{
            echo "<button class='button two goCartBtn' style='display:none; ' onclick='$cartUrl'>Go to cart</button>";
            echo "<button class='button two addCartBtn' onclick='addItem($id)'>Add to cart</button>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

    }
	// while($row = mysqli_fetch_array($searchResult)) {
	// 	$id=$row['id'];
	// 	echo "<div class='col-lg-3 cardOuterPart'>";
 //  		echo "<div class='card' >";
 //    	echo "";
 //    	echo "<h4 style='color: #4D4D4D;text-transform: capitalize;'>". $row['tbName'] ."</h4>";
 //    	echo "<p style='padding: 0;margin: 0;'>Available strips: ". $row['noOfTablets'] ."</p>";
 //    	echo "<p style='padding: 0;margin: 0;'>Cost: ". $row['cost'] ."₹/tablet strip</p>";
 //    	echo "<div style='width: 100%; position:absolute; right:10px; bottom:10px;'>";
 //      	echo "<button class='button two' onclick='return addItem($id)'>Add to cart</button>";
 //    	echo "</div>";
 //  		echo "</div>";
	// 	echo "</div>";
	// }

	mysqli_close($con);

?>
</body>
</html>