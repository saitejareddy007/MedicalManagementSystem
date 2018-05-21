<?php
	$con = mysqli_connect("localhost","root","sai","MedicalManagementSystem");	
	if(mysqli_connect_errno()){
		echo 'Failed to connect MySQL'.mysqli_connect_error();
	}
?>