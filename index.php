<?php
	session_start();
	if(isset($_SESSION['id'])){
		header('location: /MedicalManagementSystem/home.php');
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/x-icon" href="logo.png">
		<script type="text/javascript" src="script.js"></script>
		<title>MMS</title>
	</head>
<body>
	<ul id="header1">
		<span id="Home">
		</span>
	</ul>
	<div id="body">
		<div id="bodypart1">
			<form action="login.php" name="loginForm" method="post" onsubmit="return validateLoginForm()">
				<table>
					<tr>
						<td><div id="headline">Log in Here</div><td>
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
			<p class="new_user">New to Twitter?<a href="/MedicalManagementSystem/createAccount.html" class="Signup"> Sign up now &#xbb;</a></p>
		</div>
	</div>
</body>
</html>