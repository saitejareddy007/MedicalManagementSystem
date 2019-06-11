// Immediately-invoked function expression
(function() {
    // Load the script
    var script = document.createElement("SCRIPT");
    script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js';
    script.type = 'text/javascript';
    script.onload = function() {
        var $ = window.jQuery;
        // Use $ here...
    };
    document.getElementsByTagName("head")[0].appendChild(script);
})();

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
		str = str.toLowerCase();
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
				if(history.state!=null){
					history.back();
				}
               	$('.cartIcon').each(function () {
               		$(this).show()
               	})
				document.getElementById('tabletsContent').style.display="block";
				document.getElementById('cartView').style.visibility="hidden";

            }
        };
    	xmlhttp.open("GET","/MedicalManagementSystem/gettablets.php?q="+str,true);
   		xmlhttp.send();        
	
}


function getCart() {
		var xmlhttp = null;
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
                $('.removeItem').on('click',function () {
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

            }
        };
        
    	xmlhttp.open("GET","/MedicalManagementSystem/getCart.php",true);
		xmlhttp.send();
        return false;
	
}

function updateCartValue() {
	var totalCost = 0
	$('.tabInCart').each(function (index) {
		if ($(this).css('display') != 'none') {
			var text = $(this).find(".cost").text()
			totalCost+=parseInt(text.substring(6,text.length-1))
		}
	})
	$('#amountPayable').text("₹"+totalCost)
	$('#totalCost').text("₹"+totalCost)
}
var inputField = 0
function getValue(id) {
	inputField = id.value
}
function changeValue(id) {
	// body...
	if(isNaN(parseInt(id.value))){
		id.value = (inputField)
	}
}


function updateCart(id,quantity,type,cost) {
	var quantityValue = parseInt(document.getElementById('cartId'+id.toString()).value);
	// alert($('#cartId'+id.toString()).data('value'))
	if(isNaN(quantityValue)){
		return false;
	}
	if(type==-1){
		if (quantityValue==1) {
			return false;
		}
		var totalCost = "₹"+(parseInt($('#amountPayable').text().substring(1))-cost)
		
		quantityValue-=1;
	}else if(type==1){
		var totalCost = "₹"+(parseInt($('#amountPayable').text().substring(1))+cost)
		quantityValue+=1;
	}
	updateCartValue()
	document.getElementById('quantity'+id.toString()).innerHTML = "Quantity: "+quantityValue
	document.getElementById('cost'+id.toString()).innerHTML = "Cost: "+(quantityValue*cost)+"₹"
	document.getElementById('cartId'+id.toString()).value = quantityValue;

	// document.getElementByClassName('tabInCart').style.display="none"
	updateCartValue()
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
    	xmlhttp.open("GET","/MedicalManagementSystem/getCart.php?q=delete&&id="+id,true);
    else
    	xmlhttp.open("GET","/MedicalManagementSystem/getCart.php?q=update&&id="+id+"&&quantity="+quantityValue,true);
    xmlhttp.send();

	return false;
}



function cartIconClicked(id=1){
	document.getElementById('tabletsContent').style.display="none";
	// document.getElementById('tabletsView').style.margin=0;
	document.getElementById('cartView').style.visibility="visible";
	$('.cartIcon').each(function () {
        $(this).hide()
    })
	$('.removeItem').on('click',function () {
		$(this).closest('.tabInCart').css('display','none')
		updateCartValue()
	})
	if (id==1) {
		history.pushState("{'page':'cart'}", "cart", "cart");
	}
	getCart()
	return false;
}

function addItem(id) {

	$('.cartCount').each(function () {
		$(this).show();
	})
	var cartCount = 0
	$('.cartCount').each(function () {
		 cartCount = $(this).text();
	})
	cartCount = cartCount==""?0:cartCount;
	$('.cartCount').each(function () {
		$(this).text(parseInt(cartCount)+1)
	})
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
    xmlhttp.open("GET","/MedicalManagementSystem/addItem.php?q="+id,true);
    xmlhttp.send();
    
    return false;
}