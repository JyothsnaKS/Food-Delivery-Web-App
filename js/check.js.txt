function validate(form)
{
	// setting the returnvalue to true initially 
	// will be set to false when something doesn't
	// meet the required std
	var returnValue = true ;
	// using id we will be getting the values in the text feilds
	// getting all the data entered by the user on the form 
	var n = form.name.value;
	var user = form.uname.value; 
	var no = form.number.value;
	var em = form.email.value;
	var pwd1 = form.password.value;
	var pwd2 = form.cpassword.value;
	var ad = form.add.value;
	//alert(ad);
	
	// checking if a name was entered
	if(n.length == 0 || /[0-9]/gi.test(n)) 
	// the second part of the if condition is a regular expression 
	//that checks if any numbers are there in the name
	{
		alert("Enter a valid name.");
		
		frm_signup.name.value = "";
		// document.frm_signup.name.focus();
		returnValue = false;
	}
	
	// to check if the char entered for ph no are numbers 
	if (no.length >10 || no.length<10)
	{
		alert("Enter a number");
			frm_signup.number.value ="";
			returnValue=false;
	}
	if(/[^0-9]/i.test(no)) 
		{
			alert("Enter a valid number");
			frm_signup.number.value ="";
			returnValue=false;
		}

	// to check if the email id entered is valid 
	// ie if it is in the form of any email  id 
	if( ! /^\w(\.?[\w-])*@\w(\.?[\w-])*\.[a-z]{2,6}(\.[a-z]{2})?$/i.test(em))
	{	
	
		alert("Enter a valid email id.");
		frm_signup.email.value ="";
		returnValue = false;
		
	}

	if (pwd1.length == 0 || pwd1.length>10)
	{
		alert("Enter a password which is 9 characters long.");
		frm_signup.password.value = "";
		frm_signup.cpassword.value = "";
		// document.frm_signup.pwd1.focus();
		returnValue = false;
		
	}
	if (pwd1!=pwd2)
	{
		alert("Enter  password .");
		frm_signup.password.value = "";
		frm_signup.cpassword.value = "";
		// document.frm_signup.pwd1.focus();
		returnValue = false;
	}
	if(ad.length == 0 || ad.length>100)
		{
			alert("Enter an address.")
			frm_signup.add.value = "";	
			returnValue =false ;

		}
	
	if (frm_signup.name.value =='')
		{
			document.frm_signup.name.focus();
			
		}
	
	else 
		{
			if(frm_signup.name.value != '' &&  frm_signup.number.value =='')
			{
				
				document.frm_signup.number.focus();
			}
			else 
			{	if(frm_signup.number.value !='' && frm_signup.email.value =='')
				{
					
					document.frm_signup.email.focus();
				}
				else if(frm_signup.email.value !=''&&frm_signup.password.value =='')
				{
					
					document.frm_signup.password.focus();	
				}
				else
				{
					document.frm_signup.add.focus();
				}
			}
		}
	
	
	return returnValue;
}