<?php
	$con = mysqli_connect("localhost","root","sai","usersai");	
	if(mysqli_connect_errno()){
		echo 'Failed to connect MySQL'.mysqli_connect_error();
	}
?>