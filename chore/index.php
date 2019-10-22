<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="JavaScript" type="text/javascript">
function list(){
   if(window.XMLHttpRequest){
   
      xmlhttp=new XMLHttpRequest();
	   }
	else{
	   xmlhttp=new ActiveXObject("microsoft.XMLHTTP");
	   }
    xmlhttp.onreadystatechange=function(){
	       if(xmlhttp.readyState==4 && xmlhttp.status==200){
		           document.getElementById("list").innerHTML=xmlhttp.responseText;
		       }
			 else{
			    document.getElementById("list").innerHTML="processing...";
			   }
			     	
	      }
     xmlhttp.open("GET","scheduler.php");
	 xmlhttp.send();
   setTimeout("list()",10000);
 }
 
 function list1(){
   if(window.XMLHttpRequest){
   
      xmlhttp=new XMLHttpRequest();
	   }
	else{
	   xmlhttp=new ActiveXObject("microsoft.XMLHTTP");
	   }
    xmlhttp.onreadystatechange=function(){
	       if(xmlhttp.readyState==4 && xmlhttp.status==200){
		           document.getElementById("list1").innerHTML=xmlhttp.responseText;
		       }
			 else{
			    document.getElementById("list1").innerHTML="processing...";
			   }
			     	
	      }
     xmlhttp.open("GET","trigger.php");
	 xmlhttp.send();
   setTimeout("list1()",10000);
 }
 function list2(){
   if(window.XMLHttpRequest){
   
      xmlhttp=new XMLHttpRequest();
	   }
	else{
	   xmlhttp=new ActiveXObject("microsoft.XMLHTTP");
	   }
    xmlhttp.onreadystatechange=function(){
	       if(xmlhttp.readyState==4 && xmlhttp.status==200){
		           document.getElementById("list2").innerHTML=xmlhttp.responseText;
		       }
			 else{
			    document.getElementById("list2").innerHTML="processing sending...";
			   }
			     	
	      }
     xmlhttp.open("GET","sender.php");
	 xmlhttp.send();
   setTimeout("list2()",10000);
 }
 function list3(){
   if(window.XMLHttpRequest){
   
      xmlhttp=new XMLHttpRequest();
	   }
	else{
	   xmlhttp=new ActiveXObject("microsoft.XMLHTTP");
	   }
    xmlhttp.onreadystatechange=function(){
	       if(xmlhttp.readyState==4 && xmlhttp.status==200){
		           document.getElementById("list3").innerHTML=xmlhttp.responseText;
		       }
			 else{
			    document.getElementById("list3").innerHTML="message receiver is on";
			   }
			     	
	      }
     xmlhttp.open("GET","receiver.php");
	 xmlhttp.send();
   setTimeout("list3()",10000);
 }
 </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="list();list1();list2();list3();">
<table border='0' width='300px'>
<tr> <td> 
	<table id="list">

	</table>
	<table id="list1">

	</table>
	<table id="list2">

	</table>
	<table id="list3">

	</table>
</td></tr>
</table>
</body>
</html>