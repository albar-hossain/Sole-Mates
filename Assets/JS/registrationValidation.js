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

function validPass(pass)
{
var hasUpper=false;
var hasLower=false;
var hasNum=false;
for(var i=0;i<pass.length;i++)
{
if(pass[i]==pass[i].toUpperCase())
{
    hasUpper=true;
}
if(pass[i]==pass[i].toLowerCase())
{
    hasLower=true;
}
if(pass[i]>='0' && pass[i]<='9')
{
    hasNum=true;
}

if(hasUpper && hasLower || hasNum)
{
return true;
}
}
return false;
}

function hasSpecial(pass) 
{
if(pass.indexOf('#')>=0||pass.indexOf("?")>=0)
{
return true;
}
else
{
return false;
}

}

function validateRegistration()
{
refresh();

var hasError=false;

if(get("fullName").value=="")
{
    get("err_fname").innerHTML= "**Name Required";
    get("err_fname").style.color="red";
    hasError=true;
}
if(get("uname").value=="")
{
    get("err_uname").innerHTML= "**Username Required";
    get("err_uname").style.color="red";
    hasError=true;
}
else if(get("uname").value.length<5)
{
    get("err_uname").innerHTML= "**Username Should be atleast 5 character Long";
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
 if(get("pass").value=="")
{
    get("err_pass").innerHTML= "**Password Required";
    get("err_pass").style.color="red";
    hasError=true;
}
else if(get("pass").value.length<8)
{
    get("err_pass").innerHTML= "**Should be more then 8 characters";
    get("err_pass").style.color="red";
    hasError=true;
}
else if(!validPass(pass.value))
{
    get("err_pass").innerHTML= "**Password Should Contain Lower and Upper characters";
    get("err_pass").style.color="red";
    hasError=true;
}
else if(!hasSpecial(pass.value))
{
    get("err_pass").innerHTML= "**Password needs # and ?";
    get("err_pass").style.color="red";
    hasError=true;
}
return !hasError;
}
function checkusername(uname)
{
var name = uname.value;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function()
{
    if(this.readyState==4 && this.status==200)
    {
        var rt = this.responseText;
        if(rt.trim() == "true")
        {
            get("err_uname").innerHTML="";
        }
        else get("err_uname").innerHTML="Not valid";
    }
};
xhttp.open("GET","checkusername.php?uname="+name,true);
xhttp.send();
}
function refresh()
{
get("err_fname").innerHTML= "";
get("err_lname").innerHTML= "";
get("err_uname").innerHTML= "";
get("err_ad").innerHTML= "";
get("err_gender").innerHTML= "";
get("err_email").innerHTML= "";
get("err_pass").innerHTML= "";
get("err_number").innerHTML= "";
}