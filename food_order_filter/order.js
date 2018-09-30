
function verify(form)
{
	var soup =document.getElementById("soup");
	var start =document.getElementById("starter");
	var main =document.getElementById("main-course");
	var des =document.getElementById("dessert");

	// setting the returnvalue to true initially 
	// will be set to false when something doesn't
	// meet the required std
	var returnValue = true ;
	// using id we will be getting the values in the text feilds
	// getting all the data entered by the user on the form 
	var sqty = form.soup_qty.value;
	var stqty = form.starter_qty.value;
	var mcqty = form.mc_qty.value;
	var dqty = form.dessert_qty.value;

	if((soup.checked==false)&&(start.checked==false)&&(main.checked==false)&&(des.checked==false))
	{
		alert("Select your order");
		returnValue=false;
		return returnValue;
	}
	//for soup
	if((soup.checked==true)&&(/[^0-9]/i.test(sqty)) )
		{
			//alert("Enter a valid number");
			frm_order.soup_qty.value ="";
			returnValue=false;
		}
	else if((soup.checked==true)&&(sqty.length == 0) )
		{
			//alert("Enter a valid number");
			frm_order.soup_qty.value ="";
			returnValue=false;
		}
	//for starter
	if((start.checked==true)&&(/[^0-9]/i.test(stqty)))
		{
			//alert("Enter a valid number");
			frm_order.soup_qty.value ="";
			returnValue=false;
		}
	else if((start.checked==true)&&(stqty.length == 0) )
		{
			//alert("Enter a valid number");
			frm_order.starter_qty.value ="";
			returnValue=false;
		}
	//for main course
	if((main.checked==true)&&(/[^0-9]/i.test(mcqty)) )
		{
			//alert("Enter a valid number");
			frm_order.soup_qty.value ="";
			returnValue=false;
		}
	else if((main.checked==true)&&(mcqty.length == 0) )
		{
			//alert("Enter a valid number");
			frm_order.mc_qty.value ="";
			returnValue=false;
		}
	//for dessert
		if((des.checked==true)&&(/[^0-9]/i.test(dqty)) )
		{
			//alert("Enter a valid number");
			frm_order.soup_qty.value ="";
			returnValue=false;
		}
	else if((des.checked==true)&&(dqty.length == 0) )
		{
			//alert("Enter a valid number");
			frm_order.dessert_qty.value ="";
			returnValue=false;
		}


	else if(((des.checked==false)&&(dqty.length != 0))||((main.checked==false)&&(mcqty.length != 0))||((start.checked==false)&&(stqty.length != 0))||((soup.checked==false)&&(sqty.length != 0)) )
		{
			alert("No items were selected to bill. Please check again.");
			returnValue = false;
			return returnValue;
		}
	if ((/[^0-9]/i.test(dqty))||(/[^0-9]/i.test(mcqty))||(/[^0-9]/i.test(stqty))||(/[^0-9]/i.test(sqty)))
		{
			alert("Enter numbers for Qty!");
			return returnValue;
		}	
	if(((dqty.length != 0)&& dqty>6)||((mcqty.length != 0)&& mcqty>6)||((stqty.length != 0)&& stqty>6)||((sqty.length != 0)&& sqty>6))
	{ 
		alert("Maximium order per item is 5.");
		returnValue= false;
		return returnValue;
	}
		if (returnValue == false) 
			{alert("Enter Qty for selected items !"); }
	


	return returnValue;

}
