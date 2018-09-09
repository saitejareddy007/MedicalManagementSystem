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
}

function showTablets(str) {
	if(str==""){
		document.getElementById("tabletList").innerHTML = "";
        return;
	}
	else{
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabletList").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","gettablets.php?q="+str,true);
        xmlhttp.send();
	}
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
				return false;
			}