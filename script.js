function validateLoginForm(){
	var username = document.forms['loginForm']['username'].value==""||null;
	var password = document.forms['loginForm']['password'].value;
	if (username && (password==""||null)) {
		alert("Please fill all required fields");
		return false;
	}
	else if (password.length<6) {
		alert("your password must be minmum 6 characters");
		return false;
	}
}



function validateCreateAccountForm(){
	var username 		= document.forms['createAccountForm']['username'].value== ""||null;
	var password 		= document.forms['createAccountForm']['password'].value;
	var rePassword		= document.forms['createAccountForm']['rePassword'].value;
	var fullName		= document.forms['createAccountForm']['fullName'].value==""||null;
	var contactNumber	= document.forms['createAccountForm']['contactNumber'].value==""||null;

	if (username && (password==""||null) && (rePassword==""||null) && fullName && contactNumber) {
		alert("Please fill all required fields");
		return false;
	}
	else if (password.length<6 && rePassword<6) {
		alert("your password must be minmum 6 characters");
		return false;
	}
	else if (password != rePassword) {
		alert("You entered two different password");
		return false;
	}
	else if (contactNumber.length!=10) {
		alert("please enter a valid phone number");
		return false;
	}
}

function validateAddress(){

	var city 		= document.forms['placeOrderForm']['city'].value==""||null;
	var locality 	= document.forms['placeOrderForm']['locality'].value==""||null;
	var Address 	= document.forms['placeOrderForm']['Address'].value==""||null;
	var pincode 	= document.forms['placeOrderForm']['pincode'].value==""||null;
	if (city || locality || Address || pincode) {
		alert("Please fill all required fields");
		return false;
	}
	
}

function showTablets(str) {
	
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabletsView").innerHTML = this.responseText;
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
            }
        };
        xmlhttp.open("GET","gettablets.php?q="+str,true);
        xmlhttp.send();
	
}

function addItem(id) {
	document.getElementById('cartCount').style.visibility = "visible";
	var cartCount = document.getElementById('cartCount').innerHTML;
	cartCount = cartCount==""?0:cartCount;
	document.getElementById('cartCount').innerHTML = parseInt(cartCount)+1;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
    	// code for IE6, IE5
    	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	/*xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
        	document.getElementById("tabletList").innerHTML = this.responseText;
    	}
	};*/
    xmlhttp.open("GET","addItem.php?q="+id,true);
    xmlhttp.send();
    window.location.href = "./cart.php";
	return false;
}