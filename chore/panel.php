<?php session_start(); ?>

<html>
<head> 
<title> Mhealth - Panel </title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body bgcolor="#FFF">
<center>
<?php
function syspanel(){
	

print "<table border='0' class='page' height='10%' >";
 //print "<tr> <td colspan='4'> <img src='images/ban.jpg' alt='banner here' width='850px' height='200px'>  </td> </tr>";
// print "<tr> <td colspan='4'><h2> M-Health System Panel </h2> <small> Please Do Not Close </small> </td> </tr>";
print "<tr> <td style='background-color:#FFF;'><IFRAME SRC='chore/scheduler.php' WIDTH='100%' HEIGHT='48px' frameBorder='0' bgcolor='#FFF'> 
				 Iframes not supported by your browser 
			    </IFRAME>   
			</td></tr>";
print "<tr><td style='background-color:#FFF;'> <IFRAME SRC='chore/trigger.php' WIDTH='100%' HEIGHT='48px' frameBorder='0'> 
			  Iframes not supported by your browser 
			</IFRAME> </td></tr>";
print "<tr><td style='background-color:#FFF;'><IFRAME SRC='chore/sender.php' WIDTH='100%' HEIGHT='48px' frameBorder='0'> 
				 Iframes not supported by your browser 
			    </IFRAME> </td></tr>";
print "<tr><td style='background-color:#FFF;'> <IFRAME SRC='chore/receiver.php' WIDTH='100%' HEIGHT='48px' frameBorder='0'> 
				 Iframes not supported by your browser 
			    </IFRAME> </td> </tr></tr>";

print "</table>";

}
// print syspanel();
?>
</center>
</body>
</html>