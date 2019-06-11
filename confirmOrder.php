<?php
	require('MedkartAPI.php');

	session_start();
	$medkartAPI = new MedkartAPI();
	if(!isset($_POST["q"])) return; 
	if($_POST["q"]=="address"){
		$_SESSION["address"] = $_POST["address"];
	}

	else if($_POST["q"]=="confirmOrder") {

		$userId=$_SESSION['id'];
		$address  =$_SESSION["address"];
		$items=json_encode($_SESSION['cart']);
		$medkartAPI->confirmOrder($items,$userId,$address); 
		unset($_SESSION['cart']);
	}
?>