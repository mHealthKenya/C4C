<?php // session_start();

function getcon() 
{
// print "Getting con";
//get con
$server='localhost';
$user='root';
$db='t4l';
$pwd='';     //password

$conn = @mysql_connect($server, $user,$pwd); 
				//or die ('Unable to connect to server!');
				// select database for use;
				if($conn)
				{
				 @mysql_select_db($db);  
                 return $conn;	
				}
				
}




?>