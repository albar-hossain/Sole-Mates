   	function get(id){
			return document.getElementById(id);
		}
	function validEmail(email)
	{
       var pos_at=email.indexOf("@");
       var pos_dot=email.indexOf(".",pos_at+1);
       if(pos_at<pos_dot)
	   {
        return true;
       }
        return false;
	}
	
	
    function validateData()
    {
		refresh();
		
		var hasError=false;
		
		if(get("uname").value=="")
		{
			get("err_uname").innerHTML= "**Username Required";
			get("err_uname").style.color="red";
			hasError=true;
		}
		if(get("email").value=="")
		{
			get("err_email").innerHTML= "**Email Required";
			get("err_email").style.color="red";
			hasError=true;
		}
		else if(!validEmail(email.value))
		{
			get("err_email").innerHTML= "**Invalid Email Address";
			get("err_email").style.color="red";
			hasError=true;
		}
		if(get("comment").value=="")
		{
			get("err_comment").innerHTML= "**Please Comment";
			get("err_comment").style.color="red";
			hasError=true;
		}

		return !hasError;
	}
	function refresh()
	{
		get("err_uname").innerHTML= "";
		get("err_email").innerHTML= "";
		get("err_comment").innerHTML= "";
	}