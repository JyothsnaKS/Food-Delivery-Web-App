function check(form)
{
	var returnValue = true ;

	// alert('hello');
	var em = form.email.value; 
	var pwd1 = form.password.value;
	// alert(em);
	// alert(pwd1);
	if( ! /^\w(\.?[\w-])*@\w(\.?[\w-])*\.[a-z]{2,6}(\.[a-z]{2})?$/i.test(em))
	{	
	
		alert("Enter a valid email id.");
		main.email.value ="";
		returnValue = false;
		
	}
	if (pwd1.length== 0)
	{
		alert("Enter the password !");
		main.password.value = "";
		// document.main.pwd1.focus();
		returnValue = false;
		
	}
	if(main.email.value =='')
				{
					
					document.main.email.focus();
				}
				else
				{
					
					document.main.password.focus();	
				}
return returnValue ;
}
	
