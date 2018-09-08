 <?php 
	include('database.php');

	$username 		= (string)$_POST['username'];
	$password 		= $_POST['password'];
	$fullName		= $_POST['fullName'];
	$contactNumber	= $_POST['contactNumber'];

	$result	= mysqli_query($con,"INSERT INTO user (username,password,fullName,contactNumber) VALUES ('$username','$password','$fullName','$contactNumber')");

	if (!$result) {
?>
<script type="text/javascript">
	alert('Sorry our database is not linked correctly');
	window.location="/MedicalManagementSystem/createAccount.html";
</script>
<?php
	}		
	else{
?>
<script type="text/javascript">
	alert('Your account has been created successfully');
	window.location="/MedicalManagementSystem/";
</script>
<?php
	}
?>