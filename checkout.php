<?php
	// if(!isset($_SESSION['id'])){
	// 	header("location: ./");
	// }
	// $username=$_SESSION['username'];
	// $fullName=$_SESSION['fullName'];
  session_start()
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
    <style type="text/css">
	   body{
	    font-family: 'News Cycle', sans-serif;
      background: #f9e8e5;
      padding-top: 80px;
	   }

     .tabHeader{
      background: #e8554e; 
      height: 50px; 
      border-radius: 2px 2px 0 0;
      padding: 15px 0px 10px 20px;
     }
     .tabBody{
      border-radius: 0 0 2px 2px;
     }
     #loginTabBody{
      padding: 20px 45px 0 45px;
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
    .radioInside{
      display: none;
    }
    .active{
      display: block;
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
		#usernameTabArrow,#usernameTab{
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
    input:focus{
      outline: 0;
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
    <a class="navbar-brand mr-auto" href="http://localhost/MedicalManagementSystem/" style="color: white; font-family: 'Satisfy', cursive; font-size: 32px; padding: 0; margin: 0;">Medkart</a>
    
  </div>
</nav>
<div id="checkoutView" class="container-fluid" style="background: #f9e8e5; height: 200px; padding: 5px 30px 0 30px; font-family: 'Karla', sans-serif; ">
  <div class="row">
    <div class="col-sm-8" >
      <div id="loginTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="loginTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">1</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">LOGIN</p></span>
        </div>
        <div class="tabBody" id="loginTabBody" style="height: 200px;background: white;text-align: left;">
          <p style="color: #4D4D4D; margin-bottom: 5px;">Name <b style="color: black;margin-left: 20px;"><?php echo $_SESSION['fullName']?></b></p>
          <p style="color: #4D4D4D; margin-bottom: 5px;">Phone <b style="color: black;margin-left: 20px;"><?php echo $_SESSION['contactNumber']?></b></p>
          <p><a href="./logout.php" style="color: #e8554e;font-family: Roboto,Arial,sans-serif; font-size: 14px;"><b>Logout & Sign to another account</b></a></p>
          <button class="btn" style="background: #D8C3A5; color: white; margin: 0; padding: 10px 40px 10px 40px;"><b>CONTINUE CHECKOUT</b></button>
          <!-- <button class="btn" style="background: #8E8D8A; color: white; margin: 0; padding: 10px 40px 10px 40px;"><b>CONTINUE CHECKOUT</b></button> -->
        </div>
      </div>

      <div id="addressTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="addressTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">2</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">DELIVERY ADDRESS</p></span>
        </div>
        <div class="tabBody" id="addressTabBody" style="height: 600px; width: 100%; display: inline-block; background: white; padding: 20px 30px 30px 20px; ">
          <div class="radio" style="width: 16px; height: 16px; border-radius: 40px; border: 2px solid #e8554e; text-align: center; padding: 2px 0 0 0px;display: inline-block;">
            <div class="radioInside active" style="width: 8px; height: 8px; background:  #e8554e; margin: 0 auto; top:0;bottom: 0; border-radius: 8px;">
              <input type="radio" name="" style="visibility: hidden;">

            </div>
           
          </div>
           <label style="margin-left: 20px;position: absolute; line-height: 15px; color:#e8554e; font-size: 14px;font-family: Roboto,Arial,sans-serif;"><b>ADD A NEW ADDRESS</b></label>
           <div id="newAddressForm" style="padding-left: 35px;">
            <form>
              <style type="text/css">
                input.form-control:focus{
                  border-color: #e98074;
                }
                selectform-control:focus{
                  outline: 0;
              </style>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Phone Number</label>
                  <input type="number" class="form-control" id="inputNumber" placeholder="Phone Number">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Check me out
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
             
           </div>
        </div>
      </div>
      <div id="orderSummaryTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="orderSummaryTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">3</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">ORDER SUMMARY</p></span>
        </div>
        <div class="tabBody" id="orderSummaryTabBody" style="height: 100px;background: white;">
          
        </div>
      </div>
      <div id="paymentOptionTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="paymentOptionTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">4</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">PAYMENT OPTIONS</p></span>
        </div>
        <div class="tabBody" id="paymentOptionTabBody" style="height: 100px;background: white;">
          
        </div>
      </div>
    </div>
    <div class="col-sm-4" >
      <div style="height: 100px;background: white;">
        
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

    $('form').on('focus', 'input[type=number]', function (e) {
      $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault()
      })
    })
    $('form').on('blur', 'input[type=number]', function (e) {
      $(this).off('mousewheel.disableScroll')
    })

    $('.radio').on('click',function () {
      $(this).find('.radioInside').toggleClass('active')
    })
    

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
