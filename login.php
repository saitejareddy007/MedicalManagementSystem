<?php
	require('MedkartAPI.php');
	session_start();
	$medkartAPI = new MedkartAPI();
	$username = (string)$_POST['username'];
	$userData = $medkartAPI->authentication($username, $_POST['password']);
	$userType = $userData[1];
	$userData = json_decode($userData[0],true);
	if($userType=="admin"){
		$_SESSION['admin']='admin';
	}else if($userData!=null){
		$_SESSION['id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['fullName'] = $userData['fullName'];
        $_SESSION['contactNumber'] = $userData['contactNumber'];
        $_SESSION['authToken'] = $userData['authToken'];
        $_SESSION['userType'] = $userType;
        $_SESSION["credintials"] = true;
        $cart = $medkartAPI->getCart($userData['id']);
	}else{
		$_SESSION["credintials"] = false;
	}
	header('location: ./');
?>



