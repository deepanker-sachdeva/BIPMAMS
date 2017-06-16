function phone1()
{
	var x=document.getElementById("in2").value;
	if(x>9999999999||x<7000000000)
	{	document.getElementById("s2").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;}
	else
	{	document.getElementById("s2").innerHTML="<img src=image/img.png height=15px width=20px>";
		
		}
	
}
function phone2()
{
	var x=document.getElementById("in3").value;
	if(x>9999999999||x<7000000000)
	{	document.getElementById("s3").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;}
	else
	{	document.getElementById("s3").innerHTML="<img src=image/img.png height=15px width=20px>";
		
		}		
	
}
	
	function validateEmail(email) { 
 
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate(){
  
  var email = document.getElementById("in4").value;
  if (validateEmail(email)) {
    document.getElementById("s4").innerHTML="<img src=image/img.png height=15px width=20px>";
  
  } else {
    document.getElementById("s4").innerHTML="<img src=image/img1.png height=15px width=20px>";
  return false;
  }

}

function fax()
{
	var f=document.getElementById("in5").value;
	if(f>=1e7&&f<=9e11)
	document.getElementById("s5").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s5").innerHTML="<img src=image/img1.png height=15px width=20px><sub>8-12 digits</sub>";
		return false;
	}
}
function tin()
{
	var f=document.getElementById("in17").value;
	if(f>=1e7&&f<=9e19)
	document.getElementById("s6").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s6").innerHTML="<img src=image/img1.png height=15px width=20px><sub>8-20 digits</sub>";
		return false;
	}
}
function pin()
{
	var f=document.getElementById("in9").value;
	if(f>=1e5&&f<=9e5)
	document.getElementById("s8").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s8").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;
	}
}
function acc()
{
	var f=document.getElementById("in14").value;
	if(f>=1e11&&f<=9e15)
	document.getElementById("s10").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s10").innerHTML="<img src=image/img1.png height=15px width=20px><sub>12-16 digits</sub>";
		return false;
	}
}



function org()
{
	phone1();phone2();validate();fax();tin();pin();acc();
	if(phone1()==false||phone2()==false||validate()==false||fax()==false||tin()==false||pin()==false||acc()==false)
	{return false;}
	}
	
	
	
function hideshow(t,k,l,p){
if (l=='d5')
{t.style.display="block";
k.style.display="none";
}
else
{k.style.display="block";
t.style.display="none";
}




}