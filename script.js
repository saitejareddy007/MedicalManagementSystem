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
		$.get("/MedicalManagementSystem/gettablets.php?q="+str).done(function (data) {
			$("#tabletsView").html(data);
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
           		$(this).show();
           	})
			document.getElementById('tabletsContent').style.display="block";
			document.getElementById('cartContent').style.display="none";
			document.getElementById('ordersContent').style.display="none";
		});
		return false;
}

function getOrders(id=1) {
	document.getElementById('tabletsContent').style.display="none";
	document.getElementById('cartContent').style.display="none";
	document.getElementById('ordersContent').style.display="block";
	$.get("/MedicalManagementSystem/getCart.php?q=cart", { q: "orders"}).done(function(data) {
        $("#ordersView").html(data);
    });
    if (id==1) {
		history.pushState("{'page':'orders'}", "orders", "orders");
	}
	return false;
}

function cartIconClicked(id=1){
	document.getElementById('tabletsContent').style.display="none";
	document.getElementById('ordersContent').style.display="none";
	document.getElementById('cartContent').style.display="block";
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

function getCart() {
	$.get( "/MedicalManagementSystem/getCart.php?q=cart").done(function(data) {
        $("#cartView").html(data);
        $('.removeItem').on('click',function () {
        	var cartCount = parseInt($($('.cartCountValue')[0]).text())-1;
			$('.cartCountValue').text(cartCount)
        	var id = $(this).closest('p').attr('id').substring(10)
			$(this).closest('.tabInCart').css('display','none')
			updateCartValue()
			$.get("/MedicalManagementSystem/getCart.php?q=delete&&id="+id);
		});
    });
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
	var quantityValue = parseInt($('#cartId'+id.toString()).val());
	if(isNaN(quantityValue)) return false;
	if(type==-1){
		if (quantityValue==1) return false;
		var totalCost = "₹"+(parseInt($('#amountPayable').text().substring(1))-cost)
		quantityValue-=1;
	}else if(type==1){
		var totalCost = "₹"+(parseInt($('#amountPayable').text().substring(1))+cost)
		quantityValue+=1;
	}
	$('#quantity'+id.toString()).html("Quantity: "+quantityValue)
	$('#cost'+id.toString()).html("Cost: "+(quantityValue*cost)+"₹")
	$('#cartId'+id.toString()).val(quantityValue);

	updateCartValue()

	if(quantityValue==0)
    	$.get("/MedicalManagementSystem/getCart.php?q=delete&&id="+id);
    else
    	$.get("/MedicalManagementSystem/getCart.php?q=update&&id="+id+"&&quantity="+quantityValue);

	return false;
}


function addItem(id) {
	let cartCount = $($('.cartCount')[0]).text();
	cartCount = cartCount==""?0:cartCount;
	$('.cartCount').text(parseInt(cartCount)+1)
	$.get("/MedicalManagementSystem/addItem.php?q="+id);
    return false;
}