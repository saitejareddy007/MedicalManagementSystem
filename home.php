<?php
	if(!isset($_SESSION['id'])){
		header("location: ./");
	}
	$username=$_SESSION['username'];
	$fullName=$_SESSION['fullName'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --><!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif; -->
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="../script.js"></script>
    <style type="text/css">
	   body{
	    font-family: 'News Cycle', sans-serif;
      background: #f9e8e5;
      padding-top: 65px;
	   }
     .removeItem{
      cursor: pointer;
     }
      
      .curve {
        background-color: #8aa7ca;
        height: 150px;
        width: 160px;
        border-bottom-right-radius: 1000px 500px;
      }
      .card{
        border-radius: 3px;
        margin:  0; 
        height: 150px; 
        box-shadow: 0 2px 4px 0 rgba(0,0,0,.08); 
        padding: 10px;
        min-width: 200px;
      }

      .card1{
        padding: 10px 10px 0 0px;
      }
      .card2{
        padding: 10px 5px 0 0;
      }
      .card3{
        padding: 10px 0 0 5px;
      }
      .card4{
        padding: 10px 0 0 10px;
      }
      #cartView{
        /*display: none;*/
        visibility: hidden;
      }
      .button.two {
        border-radius: 25px;
        float: right;
        display: block;
        position: relative;
        width: 100px;
        color: #fff;
        text-align: center;
        background-color: #e8554e;
        border: none;
        background-repeat: no-repeat;
        background-position: -120px -120px, 0 0;
        
        background-image: -webkit-linear-gradient(
          top left,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%
        );
        background-image: -moz-linear-gradient(
          0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%
        );    
        background-image: -o-linear-gradient(
          0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%
        );
        background-image: linear-gradient(
          0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%
        );
        
        -moz-background-size: 250% 250%, 100% 100%;
             background-size: 250% 250%, 100% 100%;
        
        -webkit-transition: background-position 0s ease;
           -moz-transition: background-position 0s ease;       
             -o-transition: background-position 0s ease;
                transition: background-position 0s ease;
}
  #searchForm{
    width: 40%;
  }
		.button.two:hover {
		  background-position: 0 0, 0 0;
		  
		  -webkit-transition-duration: 0.5s;
		     -moz-transition-duration: 0.5s;
		          transition-duration: 0.5s;
		}
	   #cart{
        margin: 0; 
        padding: 10px 7px 0 0;
        text-transform: capitalize; 
        margin-bottom:25px;
      }
      #cartSummary{
        margin: 0; 
        padding:10px 0 0 7px; 
        position:relative;
      }
      #mobileView{
      display: none;
    }
    #laptopView{
      display: inherit;
    }

    #cartFooter{
      height:80px;
    }
    
		@media (max-width: 991.98px) { 
      body{
      padding-top: 100px;
    }
			.card1,.card2,.card3,.card4{
				padding: 10px 0 0 0;
			}
      #cart{
        padding-left: 0;
        padding-right: 0;
      }
      #cartSummary{
        padding-left: 0;
        padding-right: 0;
      }
      #cartFooter{
        height: 138px;
      }
      #searchForm{
        width: 100%;
      }
      #mobileView{
        display: inline-block;
      }
      #laptopView{
      display: none;
      }
    }
		.listItem{
			width: 100%;
			height: 50px;
			padding: 10px;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    margin: auto;
		    text-align: left;
		}
		.listItem:hover{
			background: #f9e8e5;
		}
		.usernameTabArrow,.usernameTab{
			display: none;
		}
    .child{
      display: table-cell;
  vertical-align: middle;
    }

    #cartHeader, #cartSummary div{
      box-shadow: 0 2px 4px 0 rgba(0,0,0,.08); 
      margin: 0; 
      height: 100px; 
      background: white; 
      border-radius: 2px;
    }

    button:focus,
		textarea:focus, 
		textarea.form-control:focus, 
		input.form-control:focus, 
		input[type=text]:focus, 
		input[type=password]:focus, 
		input[type=email]:focus, 
		input[type=number]:focus, 
		[type=text].form-control:focus, 
		[type=password].form-control:focus, 
		[type=email].form-control:focus, 
		[type=tel].form-control:focus, 
		[contenteditable].form-control:focus {
			box-shadow: inset 0 -1px 0 transparent;
      outline: 0 none;
		}
    .two:focus{
      border: 1px solid #f9e8e5;
    }
		hr{
			display: block; height: .5px;
			border: 0; border-top: .1px solid #e8554e;
			margin: 1em 0; padding: 0;
		}
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #e8554e; box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
  
  <div class="navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand mr-3 ml-auto" href="http://localhost/MedicalManagementSystem/" style="color: white; font-family: 'Satisfy', cursive; font-size: 32px; padding: 0; margin: 0;">Medkart</a>
    <ul id="mobileView" class="navbar-nav" style=" float: right;">
      <li class="mr-2 nameTab" style="width:50px;display:inline;margin:0;">
        <a class="nav-link waves-effect waves-light nameTab" href="#" style="color: white; font-family: 'Roboto', sans-serif; text-transform: capitalize;">sai <i class="fas fa-angle-down"></i></a>
        <div class="usernameTabArrow" style="width: 25px; height: 25px; position: absolute; background: white; transform: rotate(45deg); z-index: 20; margin-left: 10px; display: none;"></div>
        <div class="usernameTab" style="width: 200px; position: absolute; background: white; margin: 13px auto 0px -75px; z-index: 20; border-radius: 3px; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 4px 0px; display: none;">
          <div id="profile" class="listItem">
            <span style="font-family: 'Roboto', sans-serif;"><i class="fas fa-user-alt" style="margin-right: 10px; color: #e8554e;"></i> Profile</span>
          </div>
          <hr style="padding: 0; margin: 0;color: #e8554e;">
          <div class="listItem logout">
            <span style="font-family: 'Roboto', sans-serif;"><i class="fas fa-sign-out-alt" style="margin-right: 10px; color: #e8554e;"></i> Logout</span>
          </div>
        </div>
      </li>
      <li class="cartIcon" style="width:50px; display:inline;">
        <a class="nav-link waves-effect waves-light" href="" onclick="return cartIconClicked();" style="color: white;font-family: 'Roboto', sans-serif;width:40px;"><i class="fas fa-cart-plus"></i><span class="cartCount" style="width: 18px; height: 18px; position: absolute; background: white; border-radius: 10px; color: #e8554e; font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: bold; margin-top: -5px;margin-left: 2px; text-align: center;">7</span></a>
      </li>
    </ul>
    <form class="form-inline mr-auto my-lg-0" id="searchForm" style=" border-radius: 5px;">
      <div class="input-group" style="width: 100%;background: white; border-radius: 2px; z-index: 10;">
        <input class="form-control form-control-lg mr-sm-2 searchField" id="searchField" type="search" onkeyup="showTablets(this.value)" style="border: 0; outline: none; font-family: Roboto,Arial,sans-serif; font-size: 14px;" placeholder="Search for medicines brands and more" aria-label="Search">
        <span class="input-group-addon" style="background: white; border-radius: 5px; padding:5px 10px 0 0;">
          <a href="" style="background: transparent; padding: 0;"><i id="eye" class="fa fa-search" style="color: #e8554e; padding: 0;" aria-hidden="true"></i></a>
        </span>
      </div>
        <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
    </form>
    <ul id="laptopView" class="navbar-nav ml mr-auto mt-2 mt-lg-0">
      <li class="nav-item nameTab" style="text-align: center;">
        <a class="nav-link nameTab" href="#" style="color: white; font-family: 'Roboto', sans-serif; text-transform: capitalize;"><?php echo $fullName." "; ?><i class="fas fa-angle-down"></i></a>
        <div class="usernameTabArrow" style="width: 25px; height: 25px; position: absolute; background: white; transform: rotate(45deg);z-index: 9;margin-left:10px;"></div>
        <div class="usernameTab" style="width: 200px; position: absolute; background: white; margin: 0 auto; margin-left: -75px;margin-top:13px; z-index: 10; border-radius: 3px; box-shadow: 0 2px 4px 0 rgba(0,0,0,.1);">
        	<div id="profile" class="listItem">
        		<span style="font-family: 'Roboto', sans-serif;"><i class="fas fa-user-alt" style="margin-right: 10px; color: #e8554e;"></i> Profile</span>
        	</div>
        	<hr style="padding: 0; margin: 0;color: #e8554e;">
        	<div class="listItem logout">
        		<span style="font-family: 'Roboto', sans-serif;"><i class="fas fa-sign-out-alt" style="margin-right: 10px; color: #e8554e;"></i> Logout</span>
        	</div>
        </div>
      </li>
      <li class="nav-item cartIcon">
        <a class="nav-link" href onclick="return cartIconClicked();" style="color: white;font-family: 'Roboto', sans-serif;width:100px;"><i class="fas fa-cart-plus"></i> Cart<span class="cartCount" style="width: 18px; height: 18px; position: absolute; background: white; border-radius: 10px; color: #e8554e; font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: bold; margin-top: -5px;margin-left: 2px; text-align: center;"></span></a>
      </li>
    </ul>
  </div>
</nav>
<div id="tabletsContent" class="container-fluid" style="background: #f9e8e5; height: 200px; padding: 5px 30px 0 30px; font-family: 'Karla', sans-serif; ">
  <div class="row" id="tabletsView">
    <div class="col-sm-3 cardOuterPart" >
      <div class="card">
        <h3 style="color: #4D4D4D">DOLO 650</h3>
        <p style="padding: 0;margin: 0;">Available tablets: 50</p>
        <p style="padding: 0;margin: 0;">Cost: 50₹/tablet</p>
        <div style="width: 100%;">
          <button class="button two">Add to cart</button>
        </div>
        
      </div>
    </div>
    <div class="col-sm-3 cardOuterPart" >
      <div class="card" >
        
      </div>
    </div>
    <div class="col-sm-3 cardOuterPart" >
      <div class="card" >
        
      </div>
    </div>
    <div class="col-sm-3 cardOuterPart" >
      <div class="card" >
        
      </div>
    </div>
    <div class="col-sm-3 cardOuterPart" >
      <div class="card" >
        
      </div>
    </div>
  </div>
  
</div>
<div id="cartContent" class="container-fluid" style="background: #f9e8e5; height: 200px; padding: 5px 30px 0 30px; font-family: 'Karla', sans-serif;">
<div class="row" id="cartView">
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    window.onpopstate = function (event) {
      if(event.state==null){
        showTablets("")
      }else{
        cartIconClicked(2)
      }
    }
    

    $(window).on('hashchange', function(){
        var hash = window.location.hash;
        console.log(hash);
    });

    $(".cardOuterPart").each(function (index, value) {
      if(index%4 == 0){
        $(this).addClass("card1")
      }else if((index-1)%4 == 0){
        $(this).addClass("card2")
      }
      else if((index-2)%4 == 0){
        $(this).addClass("card3")
      }else{
        $(this).addClass("card4")
      }
    });
    // getCart();
    

    $(".usernameTabArrow").hide()
    $(".usernameTab").hide()

    $(".nameTab, .usernameTabArrow,.usernameTab").hover(function () {
    	$(".nameTab a i").removeClass()
    	$(".nameTab a i").addClass("fas fa-angle-up")
    	$(".usernameTabArrow").show()
    	$(".usernameTab").show()
    	return false;
    }, function(){
    	$(".nameTab a i").removeClass()
      $(".nameTab a i").addClass("fas fa-angle-down")
      $(".usernameTabArrow").hide()
    	$(".usernameTab").hide()
      return false;
    })

    $(".nameTab").on("click",function () {
      var currentClass = $(".nameTab a i").attr("class")
      if(currentClass == "fas fa-angle-down"){
        $(".nameTab a i").removeClass()
        $(".nameTab a i").addClass("fas fa-angle-up")
        $(".usernameTabArrow").show()
        $(".usernameTab").show()
      }else if(currentClass == "fas fa-angle-up"){
        $(".nameTab a i").removeClass()
        $(".nameTab a i").addClass("fas fa-angle-down")
        $(".usernameTabArrow").hide()
        $(".usernameTab").hide()
      }
      return false;
    })

    $(".logout").on("click",function () {
    	window.location.href = "./logout.php"
    })
    $('#cartIcon').on('click',function () {
      $(this).hide()
    })
  })
  
</script>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/js/mdb.min.js"></script>
</body>
</html>
<?php
if(isset($header['Page'])){

  ?>
  <script type="text/javascript">
    cartIconClicked(2)
  </script>
<?php
}
else{
  ?>
  <script type="text/javascript">
    showTablets("")
  </script>
  
  <?php
}
if(!isset($_SESSION['cart'])){
		?>
		<script type="text/javascript">
			$('.cartCount').each(function (index) {
         $(this).hide()
       });
		</script>
		<?php
}else{
	?>
		<script type="text/javascript">
       $('.cartCount').each(function (index) {
         $(this).text(<?php echo count($_SESSION['cart']); ?>)
       });
		</script>
	<?php
}

?>

<!-- #yin-yang {
      width: 96px;
      box-sizing: content-box;
      height: 48px;
      background: #eee;
      border-color: red;
      border-style: solid;
      border-width: 2px 2px 50px 2px;
      border-radius: 100%;
      position: relative;
    }
    #yin-yang:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 0;
      background: #eee;
      border: 18px solid red;
      border-radius: 100%;
      width: 12px;
      height: 12px;
      box-sizing: content-box;
    }
    #yin-yang:after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      background: red;
      border: 18px solid #eee;
      border-radius: 100%;
      width: 12px;
      height: 12px;
      box-sizing: content-box;
    }
 -->