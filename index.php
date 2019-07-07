<?php
    require('MedkartAPI.php');
    session_start();
    // $header = apache_request_headers(); 
    $medkartAPI = new MedkartAPI();

    if(isset($_SESSION['id']) && isset($_SESSION['authToken']) && $medkartAPI->validateAuthToken($_SESSION['id'], $_SESSION['authToken'])){
        $cart = json_decode($medkartAPI->getCart($_SESSION['id']),true);
        unset($_SESSION['cart']);
        if($cart!=null){
            for($i=0; count($cart) > $i; $i++){
                $_SESSION['cart'][$cart[$i]["id"]] = array(
                    'cartId' => $cart[$i]["cartId"],
                    'tbName' =>  $cart[$i]["tbName"],
                    'cost' =>  $cart[$i]["cost"],
                    'quantity' =>  $cart[$i]["quantity"],
                );
            }
        }
        // echo json_encode($_SESSION['cart']);
        include 'home.php';
    }else if (isset($_SESSION['admin'])) {
        include 'adminPage.php';
    }
    else{
        ?>
        <script type="text/javascript">
            if(window.location.pathname!="/MedicalManagementSystem/"){
                window.location.href = "./"
            }
        </script>
        <?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <!-- font-family: 'Karla', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <!-- font-family: 'Indie Flower', cursive; -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- font-family: 'Dancing Script', cursive; -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <!-- font-family: 'Satisfy', cursive; -->
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <!-- font-family: 'Cuprum', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=News+Cycle" rel="stylesheet">
    <!-- font-family: 'News Cycle', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <!-- font-family: 'Source Code Pro', monospace; -->
    <meta name="theme-color" content="#e8554e" />
    <meta name="mobile-web-app-capable" content="yes">
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="../script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <style type="text/css">
    	body{
    		font-family: 'News Cycle', sans-serif;
            height: 650px;
            background: #f9e8e5;
            background-image: url('med.jpg');
            overflow-y: hidden;
            overflow-x: hidden;
    	}
    	#createAccountBtn{
    		font-family: 'Source Code Pro', monospace; 
    		background-color: transparent; 
    		border-color: #e8554e; 
    		color: #e8554e; 
    		float: right;
    		transition: 400ms;
    	}
    	#createAccountBtn:hover{
    		background-color: #e8554e; 
    		border: 0;
    		color: white;
    	}
    	#pageRightContent{
            transform: rotate(-15deg);
    		color: #4D4D4D;
            height: 650px;
    		position: absolute;
			top:10%;
			bottom: 0;
			left: 10%;
            width: 500px;
			min-width: 450px;
			margin: 15% 0 0 10%;
			/*margin: auto;*/
    	}
        #leftImgContent{
            background-repeat: no-repeat; 
            height: 700px;
        }
        #mainRight{
            transform: rotate(15deg);
            background: #f9e8e5;
            padding-right: 200px;
            right: -75px;
            top:-100px;
            height: 1000px;
        }

    	@media (max-width: 767.98px) {
            body{
                background: #f9e8e5;
                height: 800px;
                overflow-y: hidden;
            }
    		#leftImgContent{
    			display: none;
    			
    		}
            #mainRight{
                transform: rotate(0deg);
                width: 100%;
            }
    		#pageRightContent{
                transform: rotate(0deg);
                top:20%;
                left: 0;
    			width: 90%;
    			min-width: 0px;
                height: 100%;
                margin: 0 auto;
    		}
    	}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body >
	<div class="container-fluid">
		<div class="row" >
			<div class="col-sm-5" id="leftImgContent" >
			</div>
			<div id="mainRight" class="col-sm-7" >
				<div id="pageRightContent">

                    <span style=" font-family: 'News Cycle', sans-serif; font-size: 32px;">Welcome to </span><span style="color: #e8554e;font-family: 'Satisfy', cursive; font-size: 32px;">Medkart</span>
                    <p style="font-family: 'News Cycle'; font-size: 16px; margin-bottom: 50px; width: 100%;">The best way to buy medicines</p>
                    <h4 style="font-family: 'News Cycle';">Log In</h4>

                    <form class="col-sm-8" style="padding: 0;" action="./login.php" name="loginForm" method="post" onsubmit="return validateLoginForm()">

                        <div class="input-group" style="margin: 0 0 10px 0;" >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="text" class="form-control" name="username" placeholder="Email">
                        </div>
                        <div class="input-group" id="show_hide_password">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            <span class="input-group-addon">
                                <a href=""><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                        </div>

                        <div class="input-group" style="width:100%; margin-bottom: 20px;">
                            <div class="checkbox" style="float: left;">
                                <label><input type="checkbox" style="" value="">Keep me Logged In</label>
                            </div>
                            <div style="float: right;">
                                <label style="margin: 10px 0 10px 0; font-size: 13px;"><a href="#">Forgot Password?</a></label>
                            </div>
                        </div>
                        <div class="input-group" style="width:100%;">
                            <button type="submit"  class="btn btn-primary" style="font-family: 'Source Code Pro', monospace; background-color: #e8554e; border: 0; float: left;">LOG IN</button>
                            <button type="button" onclick="window.location='./createAccount.html'" id="createAccountBtn" class="btn btn-primary" >CREATE ACCOUNT</button>
                        </div>

                    </form>
                </div>
			</div>
		</div>
        
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#eye').addClass( "fa-eye-slash" );
            $('#eye').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#eye').removeClass( "fa-eye-slash" );
            $('#eye').addClass( "fa-eye" );
        }
    });
});
    </script>
</body>
</html>
<?php
session_destroy();
}
    if(isset($_SESSION["credintials"]) && !$_SESSION["credintials"]){
        ?>
        <script type="text/javascript">
            alert("Entered email or password is incorrect");
        </script>
        <?php
        session_destroy();
    }
    

?>

