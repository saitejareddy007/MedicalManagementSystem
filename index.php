<?php
	session_start();
	if(isset($_SESSION['id'])){
		include 'home.php';
	}
	else{
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/x-icon" href="logo.png">
		<script type="text/javascript" src="script.js"></script>
		<title>MMS</title>
	</head>
	
<body>
	<div id="header1" >
		<div style="float:left; width: 115px;">
			<img style="width: 80px; height: 45px; padding: 18 5% 10% 20px;" src="mms.png">
		</div>
		<div style="float:left; width: 500px;">
			<p style="font-size:24px; text-shadow: 2px 2px 2px black; color: white;" >Medical Management System
			</p>
		</div>
	</div>
	<div id="body">
		<div id="bodypart1">
			<form action="login.php" name="loginForm" method="post" onsubmit="return validateLoginForm()">
				<table>
					<tr>
						<td><div id="headline">Login Here</div><td>
					</tr>
					
					<tr>
						<td><input name="username" type="text" placeholder="Phone ,email or username">
					</tr>
					
					<tr>
						<td><input name="password" type="password" placeholder="Password">
					</tr>
					<tr>
						<td>
							<button type="submit">Log in</button>&nbsp;&nbsp;<input id="check" checked="checked" type="checkbox"><a class="remember"  >Remember me &middot;</a></input>
							<a id="forget" href="#">Forget password?</a>
						</td>
					</tr>
					
				</table>
			</form>
		</div>
		<div id="bodypart2">
			<p class="new_user">New to MMS?<a href="/MedicalManagementSystem/createAccount.html" class="Signup"> Sign up now &#xbb;</a></p>
		</div>
	</div>
</body>
</html>
<?php
}
?>