 function bca()
{
alert("bcs");
 document.getElementById("txt").minLength=3;
 document.getElementById("txt").maxLength=15;
 document.getElementById("txt").required=true;
 document.getElementById("eml").required=true;
 document.getElementById("txtfld").required=true;
 document.getElementById("subject").required=true;
}
function abc(){
var a,b; 

 a=document.getElementById("txt").value;
 if(!isNaN(a))
 document.getElementById("txt").nextSibling.innerHTML=" Name must start with letter.";
 else
 document.getElementById("txt").nextSibling.innerHTML="";
 if(a=="")
 document.getElementById("txt").nextSibling.innerHTML="";
 if(a.length==15 )
 document.getElementById("txt").nextSibling.innerHTML=" Max length is 15";
  if(a.length<3 && a!="")
 document.getElementById("txt").nextSibling.innerHTML=" Min length is 3";
}
function cba(){
 var a;
a=document.getElementById("eml").value;
 if(!isNaN(a[0]))
 document.getElementById("eml").nextSibling.innerHTML=" Email shouldn't start with letter.";
 if(a=="")
 document.getElementById("eml").nextSibling.innerHTML="";
}