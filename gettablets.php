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

	$searchResult = mysqli_query($con,"SELECT * FROM tablets WHERE tbName LIKE '%$string%' ");

	
	echo "<table>
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Action</th>
        </tr>";
        
		while($row = mysqli_fetch_array($searchResult)) {
			$id=$row['id'];
		    echo "<tr>";
		    echo "<td>" . $row['tbName'] . "</td>";
		    echo "<td>" . $row['cost'] . "₹</td>";
		    echo "<td><a id='addItem' href='#' onclick='return addItem($id)'>Add item to cart</button></a>";
		    echo "</tr>";
		}
		echo "</table>";

	mysqli_close($con);

?>
</body>
</html>