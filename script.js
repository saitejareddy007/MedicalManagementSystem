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

                $(".addCartBtn").on("click",function () {
                	$(this).css("display","none");
					$(this).closest('div').find('.goCartBtn').css("display","block");
				});

            }
        };
        xmlhttp.open("GET","gettablets.php?q="+str,true);
        xmlhttp.send();
	
}

function getCart() {
	
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cartView").innerHTML = this.responseText;
                

            }
        };
        xmlhttp.open("GET","getCart.php",true);
        xmlhttp.send();
	
}

$(document).ready(function() {
	$("#card button").on("click",function () {
		alert("hai")
	})
})

function updateCart(id,quantity,type,cost) {
	var quantityValue = parseInt(document.getElementById('cartId'+id.toString()).value);
	if(isNaN(quantityValue)){
		return false;
	}
	if(type==-1){
		if (quantityValue==1) {
			return false;
		}
		quantityValue-=1;
	}else if(type==1){
		quantityValue+=1;
	}
	document.getElementById('quantity'+id.toString()).innerHTML = "Quantity: "+quantityValue
	document.getElementById('cost'+id.toString()).innerHTML = "Cost: "+(quantityValue*cost)
	document.getElementById('cartId'+id.toString()).value = quantityValue;

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
    	// code for IE6, IE5
    	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    	}
	};
	if(quantityValue==0)
    	xmlhttp.open("GET","getCart.php?q=delete&&id="+id,true);
    else
    	xmlhttp.open("GET","getCart.php?q=update&&id="+id+"&&quantity="+quantityValue,true);
    xmlhttp.send();

	return false;
}

function cartIconClicked(){
	document.getElementById('tabletsContent').style.display="none";
	// document.getElementById('tabletsView').style.margin=0;
	document.getElementById('cartView').style.visibility="visible";
	return false;
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
	xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    	}
	};
    xmlhttp.open("GET","addItem.php?q="+id,true);
    xmlhttp.send();
    // window.location.href = "./cart.php";
    // alert(this.innerHTML)

	return false;
}