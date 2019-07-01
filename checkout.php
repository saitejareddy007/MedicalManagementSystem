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
    <meta name="theme-color" content="#e8554e" />
    <meta name="mobile-web-app-capable" content="yes">
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
     .tabHeaderClose{
      display: table;
      background: white;
      width: 100%;
      border-radius: 2px 2px 0 0;
      padding: 15px 20px 10px 20px;
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
      #cartContentCount{
        display: none;
      }
      .tabBody{
        display: none;
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
      .tabHeader{
        display: none;
      }
      .inActive{
        display: none;
      }
      .tabHeaderClose{
        height: 50px;
      }
      .tick{
        display: none;
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
  .btnChange{
    display: none;
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

    #addressTabBody{
      height: 400px;
    }
    
		@media (max-width: 991.98px) { 
      body{
        padding-top: 100px;
      }
      #addressTabBody{
      height: 650px;
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
      display: inherit;
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
    <a class="navbar-brand mr-auto" href="/MedicalManagementSystem/" style="color: white; font-family: 'Satisfy', cursive; font-size: 32px; padding: 0; margin: 0;">Medkart</a>
  </div>
</nav>
<div id="checkoutView" class="container-fluid" style="background: #f9e8e5; height: 200px; padding: 5px 30px 0 30px; font-family: 'Karla', sans-serif; ">
  <div class="row">
    <div class="col-sm-8" >
      <div id="loginTab" style="margin-bottom: 20px; border-radius: 2px;">
        <div class="tabHeader" id="loginTabHeader">
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">1</p></span><span><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">LOGIN</p>
          </span>
        </div>
        <div class="tabHeaderClose" id="loginTabHeader" style="height: 80px;">
          <div style="float:left; display: inline;">
            <span style="width: 20px; height: 20px; border-radius: 2px; background: #e0e0e0; position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;">
              <p style="line-height: 22px;">1</p>
            </span>
            <span>
              <p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: #777; line-height: 20px; margin-bottom: 8px;">LOGIN<svg style="line-height: 20px; margin-bottom: 3px;" height="16" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" stroke="#e8554e"></path></svg>
              </p>
            </span>
            <div style="padding-left: 20px;">
              <p style="padding-left: 20px; font-size:14px; margin-bottom: 0;">
                <b>
                  <?php echo $_SESSION['fullName'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +91 <?php echo $_SESSION['contactNumber'];?>
                </b>
              </p>
            </div>
          </div>
            <button  class="btn btnChange active waves-effect waves-light" id="loginChangeBtn" style="display:block; float: right; box-shadow: 0 0 0 0; margin-top: 0; color:  #e8554e; border: 0.5px solid #e0e0e0;">CHANGE</button>
          </div>
        <div class="tabBody" id="loginTabBody" style="height: 200px;background: white;text-align: left;">
          <p style="color: #4D4D4D; margin-bottom: 5px;">Name <b style="color: black;margin-left: 20px;"><?php echo $_SESSION['fullName'];?></b></p>
          <p style="color: #4D4D4D; margin-bottom: 5px;">Phone <b style="color: black;margin-left: 20px;"><?php echo $_SESSION['contactNumber'];?></b></p>
          <p><a href="./logout.php" style="color: #e8554e;font-family: Roboto,Arial,sans-serif; font-size: 14px;"><b>Logout &amp; Sign to another account</b></a></p>
          <button class="btn continue waves-effect waves-light" id="addressTab" style="background: #D8C3A5; color: white; margin: 0; padding: 10px 40px 10px 40px;"><b>CONTINUE CHECKOUT</b></button>
          <!-- <button class="btn" style="background: #8E8D8A; color: white; margin: 0; padding: 10px 40px 10px 40px;"><b>CONTINUE CHECKOUT</b></button> -->
        </div>
      </div>

      <div id="addressTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader active" id="addressTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">2</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">DELIVERY ADDRESS</p></span>
        </div>
        <div class="tabHeaderClose inActive" >
          <div style="float:left; display: inline-block;">
          <span style="width: 20px; height: 20px; border-radius: 2px; background: #e0e0e0;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">2</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: #777; justify-content: stretch; margin-bottom: 0;line-height: 22px;" >DELIVERY ADDRESS<svg class="tick" style="line-height: 20px; margin-bottom: 3px;" height="16" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" ><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" stroke="#e8554e"></path></svg></p></span>
          
        </div>
        <button id="addressChangeBtn" class="btn btnChange" style="float: right; box-shadow: 0 0 0 0; margin-top: 0; color:  #e8554e; border: 0.5px solid #e0e0e0;" >CHANGE</button>
        <div style="padding-left: 20px;display: inline-block;">
              <p id="address" style="padding-left: 20px; font-size:14px;" align="justify-content">
                <b>
                  Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
                </b>
              </p>
          </div>
      </div>
        <div class="tabBody active" id="addressTabBody" style=" width: 100%; background: white; padding: 20px 30px 30px 20px; ">
          <div class="radio" style="width: 16px; height: 16px; border-radius: 40px; border: 2px solid #e8554e; text-align: center; padding: 2px 0 0 0px;display: inline-block;">
            <div class="radioInside active" style="width: 8px; height: 8px; background:  #e8554e; margin: 0 auto; top:0;bottom: 0; border-radius: 8px;">
              <input type="radio" name="" style="visibility: hidden;">
            </div>
          </div>
           <label style="margin-left: 20px;position: absolute; line-height: 15px; color:#e8554e; font-size: 14px;font-family: Roboto,Arial,sans-serif;"><b>ADD A NEW ADDRESS</b></label>
           <div id="newAddressForm" style="padding-left: 35px;">
            <form id="addressForm" >
              <style type="text/css">
                input.form-control:focus{
                  border-color: #e98074;
                }
                selectform-control:focus{
                  outline: 0;
                }
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
                    <option value="Andhra pradesh" >Andhra pradesh</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Delhi">Delhi</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <button id="saveAndDeliveryBtn" type="button" class="btn " style="background: #D8C3A5; margin-left: 0; color: white; padding: 10px 40px 10px 40px;"><b>SAVE AND DELIVER HERE</b></button>
            </form>
             
           </div>
        </div>
      </div>
      <div id="orderSummaryTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="orderSummaryTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">3</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">ORDER SUMMARY</p></span>
        </div>
        <div class="tabHeaderClose" id="orderSummaryTabHeaderClose" >
          <div style="float:left; display: inline; height: 20px;">
            <span style=" width: 20px; height: 20px; border-radius: 2px; background: #e0e0e0; position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">3</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: #777; line-height: 20px; margin-bottom: 5px;">ORDER SUMMARY<svg class="tick" style="line-height: 20px; margin-bottom: 3px;" height="16" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" ><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" stroke="#e8554e"></path></svg></p></span>
            <div style="padding-left: 20px;display: inline-block;float: left; height: 20px;">
              <p id="cartContentCount" style="padding-left: 20px; font-size:14px; margin-top: 0;" align="justify-content">
                <b>
                  <b class="cartCountValue">6</b> items
                </b>
              </p>
          </div>
          </div>
          
          <button class="btn btnChange" style="float: right; box-shadow: 0 0 0 0; margin-top: 0; color:  #e8554e; border: 0.5px solid #e0e0e0;" >CHANGE</button>
          
        </div>
        <div class="tabBody" id="orderSummaryTabBody" style="background: white;">
          <?php
            $cart = $_SESSION["cart"];
            $totalCost = 0;
            echo "<div style='max-height:450px; width:100%; overflow-y:scroll; background:white; padding:0; border-right: 1px solid rgba(0,0,0,.2); border-left: 1px solid rgba(0,0,0,.2); border-radius:0px;' >";
            $cartCount = count($_SESSION["cart"]);
            $tempCartCount = $cartCount;
            foreach ($cart as $key => $value) {
              if($tempCartCount==1){
                echo '<div class="tabInCart" style="width:100%; height:150px; padding:20px; ">';
              }else{
                echo '<div class="tabInCart" style="width:100%; height:150px; padding:20px; border-bottom: 0.5px solid rgba(0,0,0,.2); ">';
              }
              $tempCartCount-=1;
              $totalCost+=$value['quantity']*$value['cost'];
                
              echo '<h4>'.$value['tbName'].'</h4>';
              $cartId = $value['cartId'];
              echo '<p id="quantity'.$cartId.'" style="margin:0;">Quantity: '.$value['quantity'].'</p>';
              echo '<p id="cost'.$cartId.'" class="cost" style="margin:0;" value="678">Cost: '.$value['quantity']*$value['cost'].'₹</p>';

              echo "<div style='height:24px; display:inline-block; box-shadow:0 0 0 0; margin:10px 0 0 0;'>";
              echo '<div style="float: left;display: inline; height:24px; box-shadow:0 0 0 0; margin:0 0 0 0; width:150px; ">';
              echo '<a href style="height:24px;" onclick="return updateCart('.$cartId.',-1,-1,'.$value['cost'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-minus-circle"></i></a>';
              echo '<input style="text-align: center; margin: 0 10px 0 10px; padding: 0; height: 24px; width: 36px; position: relative; border-radius:2px; border:.5px solid #4D4D4D; top:-4px;" onchange="changeValue(this)" onkeydown = "getValue(this)" onkeyup="updateCart('.$cartId.',this.value,0,'.$value['cost'].');" id="cartId'.$cartId.'" value="'.$value['quantity'].'">';
              echo '<a href style="height:24px;" onclick="return updateCart('.$cartId.',1,1,'.$value['cost'].');"><i style="color:#e8554e; font-size: 24px;" class="fas fa-plus-circle"></i></a>';
                // echo '<a href="" style="height:24px" onclick="return increaseCount(this,1);"><img style="height:36px;" src="./plus-cart.svg"></a>';
              echo '</div>';
              echo "<div style='float:left; height:24px; box-shadow:0 0 0 0;'>";
              echo "<p id='removeItem".$cartId."' style='font-family: 'Roboto', sans-serif; font-weight: bold; margin-top:40px;  ><span class='removeItem'>REMOVE</span></p>";
              echo "</div>";
              echo "</div>";
              echo '</div>';
            }
            echo "</div>";
            echo "<div id='cartFooter' style='width:100%; background:white; border-bottom-right-radius:2px;border-bottom-left-radius:2px; padding:10px;border: 0.5px solid rgba(0,0,0,.2); border-top: 1px solid #f0f0f0; box-shadow: 0 -2px 10px 0 rgba(0,0,0,.1);box-sizing: border-box;position:sticky;' id='parent'>";
              echo "<button class='btn child' id='continue' style='background: #D8C3A5; margin-left: 0; color: white; border-radius:2px; width:200px;float:right;font-family: Roboto,Arial,sans-serif; padding:10px 40px 10px 40px;' >";
              echo "<span>CONTINUE</span>";
              echo "</button>";
              
              echo "</div>";
          ?>
        </div>
      </div>
      <div id="paymentOptionTab" style="margin-bottom: 20px; border-radius: 2px;" >
        <div class="tabHeader" id="paymentOptionTabHeader" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: white;position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">4</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: white; line-height: 20px;">PAYMENT OPTIONS</p></span>
        </div>
        <div class="tabHeaderClose" id="paymentOptionTabHeaderClose" >
          <span style="width: 20px; height: 20px; border-radius: 2px; background: #e0e0e0; position: absolute; padding: 0 0 0 6px; color: #e8554e;font-family: Roboto,Arial,sans-serif;"><p style="line-height: 22px;">4</p></span><span ><p style="margin-left: 40px;font-family: Roboto,Arial,sans-serif; color: #777; line-height: 20px;height: 20px; margin-bottom: 0;">PAYMENT OPTIONS</p></span>
        </div>
        <div class="tabBody" id="paymentOptionTabBody" style="height: 120px;background: white; padding: 20px 30px 30px 20px; ">
          <div style="height: 60px;">
          <div class="radio" style="width: 16px; height: 16px; border-radius: 40px; border: 2px solid #e8554e; text-align: center; padding: 2px 0 0 0px;display: inline-block;">
            <div class="radioInside active" style="width: 8px; height: 8px; background:  #e8554e; margin: 0 auto; top:0;bottom: 0; border-radius: 8px; ">
              <input type="radio" name="" style="visibility: hidden;">
            </div>
          </div>
          <label style="margin-left: 20px;position: absolute; line-height: 15px; color:#777; font-size: 14px;font-family: Roboto,Arial,sans-serif;"><b>Cash on delivery</b></label>
          <button type="submit" id="confirmOrder" class="btn " style="float: right; background: #D8C3A5; margin-left: 0; color: white; padding: 10px 40px 10px 40px;"><b>CONFIRM ORDER</b></button>
          </div>
          <div>
            <p style="color:#777; font-size: 14px;font-family: Roboto,Arial,sans-serif;">Sorry for the inconvience currently we only support cash on delivery.</p>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4" >
      <div style="height: 250px;background: white; border-radius: 2px; ">
        <?php
        echo "<div style='border: 1px solid rgba(0,0,0,.09);border-radius: 2px; height:250px;'>";
        echo '<div style="width: 100%; height: 50px; border-bottom: 0.5px solid rgba(0,0,0,.2); padding: 10px;">';
        echo '<h5 style="color:#878787; font-family: "Roboto", sans-serif; font-weight: bold;" >PRICE DETAILS</h5>';
        echo '</div>';
        echo '<div style="width:100%; height:150px; padding:20px; box-shadow:0 0 0 0;">';
        echo "<div style='height:40px; box-shadow:0 0 0 0;'>";
        echo '<p id="cartCount" style="float:left; margin:0;">Price (<b id="cartCountValue">'.$cartCount.'</b> items)</p>';
        echo '<p id="totalCost" style="float:right; margin:0;">₹'.$totalCost.'</p>';
        echo "</div>";
        echo "<div style='height:40px; box-shadow:0 0 0 0; border-bottom:.5px dashed #4D4D4D;'>";
        echo "<p style='float:left;'>Delivery Charges</p>";
        echo "<p style='float:right; color:green;'>FREE</p>";
        echo "</div>";
        echo "<div style='height:40px; box-shadow:0 0 0 0; margin-top:20px;'>";
        echo "<p style='float:left;'>Amount Payable</p>";
        echo '<p id="amountPayable" style="float:right;">₹'.$totalCost.'</p>';
        echo "</div>";
        echo '</div>';
        echo "</div>";
      ?>
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

    $('.removeItem').on('click',function () {
      var xmlhttp = null;
      var cartCount = parseInt($('#cartCountValue').text())-1;
      $('#cartCountValue').text(cartCount)
      var id = $(this).closest('p').attr('id').substring(10)
      $(this).closest('.tabInCart').css('display','none')
      updateCartValue()
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.open("GET","/MedicalManagementSystem/getCart.php?q=delete&&id="+id,true);
      xmlhttp.send();
    });

    $('form').on('focus', 'input[type=number]', function (e) {
      $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault()
      })
    })
    $('form').on('blur', 'input[type=number]', function (e) {
      $(this).off('mousewheel.disableScroll')
    })

    $('.radio').on('click',function() {
      $(this).find('.radioInside').toggleClass('active')
    })
    

    $(window).on('hashchange', function(){
        var hash = window.location.hash;
        console.log(hash);
    });
    function validateAddressForm() {
      var name = $("#inputName").val().trim();
      var phone = $("#inputNumber").val().trim();
      var address = $("#inputAddress").val().trim();
      var city = $("#inputCity").val().trim();
      var state = $("#inputState").val().trim();
      var zipcode = $("#inputZip").val().trim();

      if (!(name && phone && address && city && state && zipcode)) return true;
      var addressStr = name+", "+address+", "+city+", "+state+", "+zipcode+".";

      $.post( "confirmOrder.php", { q: "address", address: addressStr}).done(function() {
        $("#address").text(addressStr);
      });
    }
    $("#saveAndDeliveryBtn").on("click",function () {
      if(validateAddressForm()) return;

      $('#addressChangeBtn').show()

      $(this).parent().parent().parent().parent().find('.tabHeader').hide()
      $(this).parent().parent().parent().parent().find('.tabHeaderClose').css('display','table')
      $(this).parent().parent().parent().parent().find('.tabHeaderClose').find('.tick').show()
      $(this).parent().parent().parent().hide()
      $("#address").show()

      $("#orderSummaryTab").find('.tabHeader').show()
      $("#orderSummaryTab").find('.tabBody').show()
      $("#orderSummaryTab").find('.tabHeaderClose').hide()
      return false;
    })

    $("#continue").on("click",function () {
      $("#cartContentCount .cartCountValue").text(<?php echo count($_SESSION["cart"]);?>)
      $("#orderSummaryTabHeader").hide()
      $("#orderSummaryTabHeaderClose").show()
      $("#orderSummaryTabHeader").parent().find(".tabBody").hide();
      $("#orderSummaryTabHeaderClose").find('.tick').show()
      $("#cartContentCount").show()
      $(".btnChange").show()
      $("#paymentOptionTabHeader").show()
      $("#paymentOptionTabHeaderClose").hide()
      $("#paymentOptionTabBody").show()
      return false;
    })

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
    $('.btnChange').on("click",function () {
      if($(this).attr('id')=="loginChangeBtn"){
        $('.tick').hide()
        $(".btnChange").hide()
        $("#loginChangeBtn").show()
        $("#address").hide()
        $('addressTab').find('.tabHeaderClose').show()
        $('addressTab').find('.tabHeader').hide()
        $('addressTab').find('.tabBody').hide()
        $("#cartContentCount").hide()
        $("#cartContentCount .cartCountValue").text(<?php echo count($_SESSION["cart"]);?>)
        // $("#address").parent().hide()
      }
      else if($(this).attr('id')=="addressChangeBtn"){
        $("#orderSummaryTabHeaderClose").find('.btn').hide()
        $("#orderSummaryTabHeaderClose").find('.tick').hide()
        $("#cartContentCount").hide()
      }
      $('.tabHeader').hide()
      $('.tabBody').hide()
      $('.tabHeaderClose').show()
      $(this).parent().parent().find('.tabHeader').show()//.hide()parent().parent().closest('.tabHeader').addClass('active')
      $(this).parent().parent().find('.tabBody').show()
      $(this).parent().hide()
      // $('#loginTabHeader').addClass('active')
    })
    $('.continue').on('click',function () {
      resId = $(this).attr('id')
      $(this).parent().parent().find('.tabHeader').hide()
      $(this).parent().parent().find('.tabHeaderClose').show()
      $(this).parent().hide()

      $('#'+resId+"Header").show()
      $('#'+resId+"Header").parent().find('.tabHeaderClose').hide()
      $('#'+resId+"Header").parent().find('.tabBody').show()

      return false;
    });

    $("#confirmOrder").on("click",function () {
      $.post( "confirmOrder.php", { q: "confirmOrder"}).done(function() {
        console.log("order placed");
        window.location = "/MedicalManagementSystem/history.php"
      });
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
