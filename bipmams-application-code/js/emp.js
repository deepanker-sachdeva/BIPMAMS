function emp()
{
	acc();phone1();phone2();pin();pan();
	if(phone1()==false||phone2()==false||acc()==false||pin()==false||pan()==false)
	{return false;}

}

function acc()
{
	var f=document.getElementById("in3").value;
	if(f>=1e11&&f<=9e15)
	document.getElementById("s1").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s1").innerHTML="<img src=image/img1.png height=15px width=20px>";
		document.getElementById("x").innerHTML="12-16 digits";
		return false;
	}
}

function phone1()
{
	var x=document.getElementById("in4").value;
	if(x>9999999999||x<7000000000)
	{	document.getElementById("s2").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;}
	else
	{	document.getElementById("s2").innerHTML="<img src=image/img.png height=15px width=20px>";}
}

function phone2()
{
	var x=document.getElementById("in5").value;
	if(x>9999999999||x<7000000000)
	{	document.getElementById("s3").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;}
	else
	{	document.getElementById("s3").innerHTML="<img src=image/img.png height=15px width=20px>";}		
}

function pin()
{
	var f=document.getElementById("in10").value;
	if(f>=1e5&&f<=9e5)
	document.getElementById("s4").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s4").innerHTML="<img src=image/img1.png height=15px width=20px>";
		return false;
	}
}

function pan()
{
	var f=document.getElementById("in16").value.length;
	if(f==10)
	document.getElementById("s5").innerHTML="<img src=image/img.png height=15px width=20px>";
	else
	{
		document.getElementById("s5").innerHTML="<img src=image/img1.png height=15px width=20px><sub>10 digits</sub>";
		return false;
	}
}	



function hideshow(t,k,l,p){
if (l=='d20')
{t.style.display="block";
k.style.display="none";
}
else
{k.style.display="block";
t.style.display="none";
}




}
