<?php session_start();  

include("../conn.php");
  $con=getcon();
require_once("DbInterface.php");
$dbi=new DbInterface();
// $dbi->sendCustomReply($con,$mobile,$out_msg); 
require_once("taskInterpreter.php");
?>
<html>
<head> 
<title> mHealth - Trigger </title>
<META HTTP-EQUIV="REFRESH" CONTENT="30"></meta>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body id="loggerdiv">
Message processor is on
<?php	
	// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SMS Reminder Trigger xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	print '<marquee  loop="infinite" behavior="slide"
           direction="down" height="100%" scrollamount="1">';
 //xxxxxxxxxxxxxxxxxxxxxxxxxxxxx INCOMING MESSAGES PROCESSING xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		     //get incoming msg that hasn't been processed
		 $qry="select * from sms_incoming where sms_status='not processed'";
		 $rs=mysql_query($qry,$con) or die("unable to get incoming msg ".mysql_error());
	 while($row=mysql_fetch_array($rs)) {	  //1
    
		 $category=$row['category'];
		 $msg=$row['msg'];
		 $source=$row['source'];
		 $format=$row['format'];
		 $datetime=$row['sms_datetime'];
		 
	     $mobile=substr($source, -9);
		 $len=strlen($mobile);
		 if($len < 10) {  //+2
		 $mobile="0".$mobile;  //mobile is source phone
		               }  //-1									   				           	
	    	
		if($format=="correct"){	
				 if($category=="stock"){ 				 
				
			 $msg_str = str_replace("'", "", $msg);		 //REMOVE APOSTROPHIES		
			 $message_input = preg_replace('/[^a-zA-Z0-9 ]/s', '*', $msg_str);  //REMOVE SPECIAL CHARACTERS
			 $msgpart = explode("*", $message_input);
				$in_string=$msgpart[0]; 
		
								if($in_string="bs"){
								   $in_string="stock";
								     }               //$msg    ==> BS*22*55*55*55*58
				$msg_0=$msgpart[0];    //BS ==>COMMAND
				$msg_1=$msgpart[1];     //unitsin
				$msg_2=$msgpart[2];    //sblood
				$msg_3=$msgpart[3];   //ublood
				$msg_4=$msgpart[4];     //usorted
				$msg_5=$msgpart[5];    //unitsout
				$msg_6=$msgpart[6];    //code
				
				
				  $unitsin=$msg_1;
			      $sblood=$msg_2;
				  $ublood=$msg_3;
				  $usorted=$msg_4; 
				  $unitsout=$msg_5;	 
				  $code=$msg_6;	
				  
				  $today=date("d");
		//Get last submission date
		    $today=date("Y-m-d H:i:s");	
		    $last_sub=$dbi->check_lastsub($con,$code);
			$todaystrt = strtotime($today);			
			$timestamp = strtotime($last_sub);
			$dsub_day= date("d", $timestamp);
			$dtoday= date("d", $todaystrt);
			
			
			//print $datetime."</br>";
			//print "This is today day ==> ".$dtoday."</br>";					
		    //print "This is last sub day ==> ".$dsub_day."</br>";
			
			//print "This is last sub strtm ==> ".$sub_day."</br>";	
			//print "This is today strtm ==> ".$today."</br>";
			
			
			 	   
 //CHECK WHETHER PREVIOULSY REGISTERED
		 $fcheck=$dbi->check_existence($con,$code);
				 if(!$fcheck){    //REPORTING FOR ONLY REGISTERED CLIENTS
			$out_msg="Kindly use the approved CODE for valid stock submission";
		    $dbi->sendCustomReply($con,$mobile,$out_msg); 		
 $update='update sms_incoming set sms_status="processed" where sms_datetime="'.$datetime.'"';
 $rs=mysql_query($update,$con);// or die ("Unable to mark incoming message as received ".mysql_error()."\r\n"); 
				 }
				 else{				
				 	 
				//search instring in sysprocess for sms registration
	$string='select * from sysprocess where in_text like "'.$in_string.'%"'; //INSTRING ==>STOCK
	$sysrs=mysql_query($string,$con) or die("unable to get sysprocess service definition ".mysql_error());								
			if(mysql_num_rows($sysrs) > 0) {	    //-4		
			$sysrow=mysql_fetch_array($sysrs);			
				   $categ=$sysrow['categ'];            //stock
		           $sub_categ=$sysrow['sub_categ'];    //stock
		           $message=$sysrow['out_msg'];			//Thank you for submiting daily stock
				   $action=$sysrow['actions'];          //auto				
				//call task interpreter to interpret what needs to be done
				$task="incoming";
				$service_id=$sysrow['sysdef_id'];    //4
				$sysprocess_id=$sysrow['id'];	//3	
				
				$names=$dbi->getSatellite($code,$con);		    
    getTask($con,$task,$action,$mobile,$message,$names,$code,$service_id,$sysprocess_id,$unitsin,$sblood,$ublood,$usorted,$unitsout,$dtoday,$dsub_day,$datetime);
				/*		   //end not exist
	             print "This is last mobile ==> ".$mobile."</br>";
				 print "This is last message ==> ".$message."</br>";
				 print "This is last names ==> ".$names."</br>";
				 print "This is last mfl code ==> ".$code."</br>";
				 print "This is last service id ==> ".$service_id."</br>";
				 print "This is last process id ==> ".$sysprocess_id."</br>";
				 print "This is last units in ==> ".$unitsin."</br>";
				 print "This is last screened blood ==> ".$sblood."</br>";	
				 print "This is last unscreened blood ==> ".$ublood."</br>";
				 print "This is last units sorted ==> ".$usorted."</br>";
				 print "This is last units out ==> ".$unitsout."</br>";
				 print "This is last datetime ==> ".$datetime."</br>";						
			     print "This is last sub day ==> ".$sub_day."</br>";
			     print "This is today ==> ".$today."</br>"; 
				 die();*/
			 // $dbi->updateIncomingflag($con,$mobile,$datetime);
			//USE THE BELOW FORMAT FOR DATETIME COMPARISON    =====>VERY IMPORTANT!!!!
 $update='update sms_incoming set sms_status="processed" where sms_datetime="'.$datetime.'"';
	 $rs=mysql_query($update,$con);// or die ("Unable to mark incoming message as received ".mysql_error()."\r\n");
			          }			                   
				  }  
				}  
			}	  
		

	if ($format=="incorrect") {	
	      		//FOR INCORRECT INPUT
	 $out_msg = "Incorrect format.";
	 $status="processed";
	$update='update sms_incoming set sms_status="processed" where sms_datetime="'.$datetime.'"';
	$rs=mysql_query($update,$con);
	
	 $insert='insert into ozekimessageout (receiver,msg,status)
	          values ("'.$mobile.'","'.$out_msg.'","send" )';
			  mysql_query($insert,$con) or die ("Unable to send message ".mysql_error());
		
	}			
			
}  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxEND OF INCOMING MESSAGES PROCESSING xxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxREMINDER NOTIFICATIONS xxxxxxxx
$day=date("w");
$hour=date("H");
print $hour."<br/>";
print $day."<br/>";

  if(($day==1 || $day==2 || $day==3 || $day==4 || $day==5) && ($hour==12) ) {
			
	  $qry="SELECT satellitecode,satellite_name,date,mobile_no,sent_flag
								FROM stock
								WHERE satellitecode IN
										(
										SELECT satellitecode
										FROM stock 
										GROUP BY satellitecode
										HAVING id = max(id)) AND date!=''";			 	  
	
	$rs=mysql_query($qry,$con) or die("Unable to get submission records ".mysql_error());	
	while($row=mysql_fetch_array($rs)) {
		$id=$row['id'];
		$code =$row['satellitecode'];
		$satellite_name =$row['satellite_name'];
		$mobile_no =$row['mobile_no'];
		$flag =$row['sent_flag'];
		$date =$row['date'];
	    $today=date("Y-m-d H:i:s");			
		  //Check latest submission date for each satellite
		// print "This  is satellite code : ".$satellitecode."  With max date ".$date."</br>";
		//die();
		 if($flag==1){	
		      $last_sub = strtotime($date);	
		  	  $now = time($now);			  
			  $time_diff= $now-$last_sub;
			  //get hours ->7
		      $hoursdiff=round($time_diff/3600);
			  if ($hoursdiff >= 24){
			  $msg="Hi, Kindly remember to send your daily stocks!";
			  $mobile=$dbi->getMobile($code,$con);		 				
				 		   //take to outgoing table ==>Send reminder
			  $insert='insert into sms_outgoing (dest,sms_datetime,msg)
			   values("'.$mobile.'","'.$today.'","'.$msg.'")';
				mysql_query($insert,$con) or die("Unable to send to outgoing sms ".mysql_error());
				print "Successfully sent reminder";
					//Update to avoid looping and optimize
			 $update="update stock set sent_flag='0' where satellitecode='$code'";
			 mysql_query($update,$con)or die("Error while updating appointment status");
		
			}
		}
	}
 }
	  
 if(($day==1 || $day==2 || $day==3 || $day==4 || $day==5) && ($hour==11) ) {
	 	//Update status  
	 $qry="SELECT satellitecode,satellite_name,date,mobile_no,sent_flag
								FROM stock
								WHERE satellitecode IN
										(
										SELECT satellitecode
										FROM stock 
										GROUP BY satellitecode
										HAVING id = max(id)) AND date!=''";		
	$rs=mysql_query($qry,$con) or die("Unable to get submission records ".mysql_error());	
	while($row=mysql_fetch_array($rs)) {
		$id=$row['id'];
		$satellitecode =$row['satellitecode'];
		$satellite_name =$row['satellite_name'];
		$mobile =$row['mobile_no'];
		$flag =$row['sent_flag'];
		$date =$row['date'];
	    $today=date("Y-m-d H:i:s");					
		  //Check flag
		
		  if($flag==0){	
		  
					$update="update stock set sent_flag='1' where satellitecode='$satellitecode'";
					mysql_query($update,$con)or die("Error while updating appointment status");
					print "Successfully updated time </br>";
			
		}
	}
} 	  

   
?>
</marquee>

</body>
</html>