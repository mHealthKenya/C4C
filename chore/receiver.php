<?php session_start();  

include("../conn.php");
  $con=getcon();

?>
<html>
<head> 
<title> Mhealth - Receiver </title>
<META HTTP-EQUIV="REFRESH" CONTENT="5"></meta>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body id="loggerdiv">
<?php print "Message receiver is on"; ?>
<marquee  loop="infinite" behavior="slide"
 direction="down" height="100%" scrollamount="1">
<?php

// xxxxxxxxxxxxxxxxxxxxxxx  Receiving Messages xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 include_once("DbInterface.php");
 $dbi=new DbInterface();

 
$qry="select MSISDN,message from inbox where sms_status = 'not processed'";
 //$qry="select sender,msg from ozekimessagein";   local gateway ==>change msg and sender below
 $rs=mysql_query($qry,$con) or die ("Unable to get incoming messages ".mysql_error()); 
 while($row=mysql_fetch_array($rs)) 
 {	
               $sender=$row['MSISDN'];   //change here for local gateway to sender
			   $source = strtolower($sender);   //put sender string in lower case		
               $msg=$row['message'];
			   $today=date("d/m/y");
			   $cformat="correct";
			   $wformat="incorrect";			
		 if(mysql_num_rows($rs)>0)
			{   //Exists some msg
			  if($sender!="safaricom"){
			 
			   $msg = strtolower($msg);   //put string in lower case			 
			    print "Message=====> ".$msg."</br>";
			//die();
				$msg_full = explode("*", $msg);    //SELECT FIRST LETTER ==>COMMAND
				$msg_0=$msg_full[0];    //
				$msg_1=$msg_full[1]; 
				
				$stock="bs";//First message for registration ===Submit blood groups				
				
			if ($msg_0 == $stock){
					//Submit blood groups	
				    $category="stock";
								//insert to incoming table
	$insert='insert into sms_incoming (category,source,msg,sms_datetime,format)
	values ("'.$category.'","'.$sender.'","'.$msg.'",now(),"'.$cformat.'")';
	mysql_query($insert,$con) or die ("Unable to receive message ".mysql_error());
									}			
			                 else {	
			
	$insert='insert into sms_incoming (source,msg,sms_datetime,format)
	values ("'.$sender.'","'.$wmsg.'",now(),"'.$wformat.'")';
	mysql_query($insert,$con) or die ("Unable to receive message ".mysql_error());	
									}		
				               }
			  // remove from ozekiin table --optimization
			$delete='delete from inbox';
			mysql_query($delete,$con) or die("Unable to move record ".mysql_error());		
			//print "Processing Incoming Messages";		 
		  
	  }		
  	}
function URLopen($url)
{
        // Fake the browser type
        ini_set('user_agent','MSIE 4\.0b2;');

        $dh = fopen("$url",'r');
        $result = fread($dh,8192);                                                                                                                            
        return $result;
}


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxx End Receiving Broadcast SMS Messages xxxxxxxxxxxxxxxxxx
print '</marquee>';

?>


</body>
</html>