<?php session_start(); 

include("../conn.php");
 $con=getcon();

?>
<html>
<head> 
<title> Mhealth - Sender </title>
<META HTTP-EQUIV="REFRESH" CONTENT="5"></meta>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body id="loggerdiv">
<?php print "Message sender is on"; ?>
<marquee  loop="infinite" behavior="slide"
 direction="down" height="100%" scrollamount="1">


<?php

// xxxxxxxxxxxxxxxxxxxxxxx  Sending Messages xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


 //include_once("connLive.php");
 include_once("DbInterface.php");
 $dbi=new DbInterface();
 
 $qry="select dest,msg from sms_outgoing where sms_status='not sent'";
 $rs=mysql_query($qry,$con) or die ("Unable to get outgoing messages ".mysql_error());
 
 while($row=mysql_fetch_array($rs)) 
 {
 
  	 $dest=$row['dest'];
	 $msg=$row['msg'];
	 
	 //print $dest."<br/>";
	// print $msg."<br/>";
	 
  //Number process
 		
	$mobile=substr($dest, -9);
    $len=strlen($mobile);
	if($len < 10) {
		$num="254".$mobile;
		//$num="0".$mobile;
		}
$username="smacharia@mhealthkenya.org";
$password="works";	
	//$num="254703779153";
	//$msg="Z1";
	$senderid="22108";  //mpep shortcode
	$message= array("sender"=>$senderid,"recipient"=>$num ,"message"=>$msg);
	$URL="http://104.155.214.144/fastSMSstage/public/api/v1/messages";
	$sms = json_encode($message);
	$httpRequest = curl_init($URL);
	curl_setopt($httpRequest, CURLOPT_NOBODY, true);
	curl_setopt($httpRequest, CURLOPT_POST, true);
	curl_setopt($httpRequest, CURLOPT_POSTFIELDS, $sms);
	curl_setopt($httpRequest, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
	curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($sms)));
	curl_setopt($httpRequest, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($httpRequest, CURLOPT_USERPWD, "$username:$password");
	
			$results=curl_exec ($httpRequest);
			$status_code = curl_getinfo($httpRequest, CURLINFO_HTTP_CODE); //get status code
			curl_close ($httpRequest);
			$response = json_decode($results);
			
			echo $status_code;
			echo $response->message;
			echo $num;
			
		/* //insert to ozeki out
	 $insert='insert into ozekimessageout (receiver,msg,status)
	          values ("'.$dest.'","'.$msg.'","send" )';
			  mysql_query($insert,$con) or die ("Unable to send message ".mysql_error()); */ 		  	
			
			  
	 // remove from sms_outgoing table --optimization
	        $update="UPDATE sms_outgoing SET sms_status='sent'";
			mysql_query($update,$con) or die("Unable to remove record ".mysql_error());
			
	       /* $delete='DELETE FROM sms_outgoing';
			mysql_query($delete,$con) or die("Unable to remove record ".mysql_error());*/
	
 }

// xxxxxxxxxxxxxxxxxxxxxxx End Sending Messages xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

   
function URLopen($url)
{
        // Fake the browser type
        ini_set('user_agent','MSIE 4\.0b2;');

        $dh = fopen("$url",'r');
        $result = fread($dh,8192);                                                                                                                            
        return $result;
}


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxx End Sending Broadcast SMS Messages xxxxxxxxxxxxxxxxxx
print '</marquee>';

?>


</body>
</html>