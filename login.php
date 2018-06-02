<?php
	include('database.php');

	session_start();

	$username	= $_POST['username'];

	$result		= mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");

	$row 		= $result->fetch_assoc();

	if(isset($_POST['username'])&&isset($_POST['password'])){
		if($username=='admin'&&$_POST['password']=='admin@cms'){
			$_SESSION['admin']='admin';
			header('location: /MedicalManagementSystem/');
		}
		if($_POST['password']==$row['password']){
			$_SESSION['id'] = $row['id'];
	        $_SESSION['username'] = $username;
			header('Location: /MedicalManagementSystem/home.php');
		}
		else{
			?>			
<script>
			alert("Entered email or password is incorrect");
			window.location="/MedicalManagementSystem";
</script>
			<?php
		}	
	}
?>



