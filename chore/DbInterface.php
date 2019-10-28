<?php 
// Database interface  functions
error_reporting(E_ERROR | E_PARSE);
    //session_register('errorMessage');
	$_SESSION['errorMessage']=array();
class DbInterface {

function connect() {
include("../conn.php");

return $con=getcon();

}
function check_lastsub($con,$code){
 $qry="SELECT date
				FROM stock
				WHERE satellitecode IN
					(
				SELECT satellitecode
				FROM stock 
				GROUP BY satellitecode
				HAVING id = max(id)) AND satellitecode='$code'";
	 $rs=mysql_query($qry,$con); // or die ("Unable to get patient id ".mysql_error()."\r\n");
	     if($rs)
		   {
		  $did=mysql_fetch_row($rs);
		  $date=$did[0];
           return $date;
		   }
	else
     {
     $userErr="Unable to get Last submission.";
     $this->getError($userErr);
     $this->errlog($userErr."i.e ".mysql_error()."\r\n");
     }
 }	
function check_existence($con,$code){
	$qry="select satelliteid from rbtc_facilities where satellitecode='$code'";
	$rs=mysql_query($qry,$con) or die("Error ocurred while checking satellite code");
	
	if(mysql_num_rows($rs)>0){
		return true;
	}
	else {
		return false;
	}
}
function getSatellite($code,$con)
 {
	$qry="select satellite_name from rbtc_facilities where satellitecode='$code'";	
    $rs=mysql_query($qry,$con); // or die ("Unable to get patient id ".mysql_error()."\r\n");
	     if($rs)
		   {
		  $did=mysql_fetch_row($rs);
		  $names=$did[0];
           return $names;
		   }
	else
     {
     $userErr="Unable to get Satellite names.";
     $this->getError($userErr);
     $this->errlog($userErr."i.e ".mysql_error()."\r\n");
     }
 }
function getMobile($code,$con)
 {
	$qry="select mobile_no from rbtc_facilities where satellitecode='$code'";	
    $rs=mysql_query($qry,$con); // or die ("Unable to get patient id ".mysql_error()."\r\n");
	     if($rs)
		   {
		  $did=mysql_fetch_row($rs);
		  $mobile=$did[0];
           return $mobile;
		   }
	else
     {
     $userErr="Unable to get Satellite mobile.";
     $this->getError($userErr);
     $this->errlog($userErr."i.e ".mysql_error()."\r\n");
     }
 }
function sendCustomReply($con,$mobile,$out_msg){    //custom replies sawa, shida
	$today=date("d/m/Y");
	
	//check mobile format
	$len=strlen($mobile);
	if($len < 10) {
		//$mobile="+254".$mobile;
		$mobile="0".$mobile;
	}
	
	$qry='insert into sms_outgoing (dest,sms_datetime,msg)
	     values("'.$mobile.'","'.$today.'","'.$out_msg.'")';
	$rs=mysql_query($qry,$con);// or die ("Unable to send response ".mysql_error()."\r\n"); 
	if($rs)
	{
	print "<br/> Response Sent Successfully <br/> ";	
	}
	
	else
	 {
	   $userErr="Unable to send response  .";
       $this->getError($userErr);
       $this->errlog($userErr."i.e ".mysql_error()."\r\n");
	   	
	 }
}
function getSyscateg($con,$sysprocess_id)
{
	$qry="select categ,sub_categ,out_msg from sysprocess where id='$sysprocess_id'";
	$rs=mysql_query($qry,$con);// or die ("Unable to sysprocess categ ".mysql_error()."\r\n");
	if($rs)
	{
	$row=mysql_fetch_row($rs);
	return $row;
	}
	
	else
	 {
	   $userErr="Unable to sysprocess categ .";
       $this->getError($userErr);
       $this->errlog($userErr."i.e ".mysql_error()."\r\n");
	   	
	 }
}        
function insert_into_stock($con,$names,$code,$datetime,$mobile,$unitsin,$sblood,$ublood,$usorted,$unitsout,$datetime)  
{
//$state=1;
$insert='insert into stock (satellite_name,satellitecode,date,mobile_no,screened,unscreened,units_out,units_in,units_sorted) values("'.$names.'","'.$code.'","'.$datetime.'","'.$mobile.'","'.$sblood.'","'.$ublood.'","'.$unitsout.'","'.$unitsin.'","'.$usorted.'")';
	
	$rs=mysql_query($insert,$con);// or die ("Unable to insert into syscontent in ".mysql_error()."\r\n");
	
	if($rs)
	{
	print "<br/> Successfully inserted in to stocks <br/>";
	}
	else
	{
	   $userErr="Unable to insert into stocks .";
       $this->getError($userErr);
       $this->errlog($userErr."i.e ".mysql_error()."\r\n");
	   	
	}
		
}
 
function update_stock($con,$names,$code,$datetime,$mobile,$unitsin,$sblood,$ublood,$usorted,$unitsout,$datetime)  
{

$update="UPDATE stock SET satellite_name='$names',satellitecode='$code',date='$datetime',mobile_no='$mobile',screened='$sblood',unscreened='$ublood',units_out='$unitsout',units_in='$unitsin',units_sorted='$usorted' WHERE satellitecode='$code' ORDER BY id DESC LIMIT 1";
$res=mysql_query($update,$con) ;//or die ("Unable to Update Broadcast Service Date ".mysql_error()."\r\n");
	if($rs)
	{
	print "<br/> Successfully updatedstocks <br/>";
	}
	else
	{
	   $userErr="Unable to update stocks .";
       $this->getError($userErr);
       $this->errlog($userErr."i.e ".mysql_error()."\r\n");
	   	
	}
		
}

function dothelog($con,$username,$event,$p_id)
{
	$qry="insert into sys_log (actions,datetime,username,p_id)
	     values('$event',now(),'$username','$p_id')";
	$res=mysql_query($qry,$con);// or die();		
}


function getError($errMessage)//add the error message to an array session
{
	array_push($_SESSION['errorMessage'],$errMessage);	
}


function errlog($errorMessage)//log the error.
{
    $date=date("D M j G:i:s Y",time());
    $filename="errLog.txt";
    if(!file_exists("$filename"))
	{
		touch("$filename");// create the logfile and log error message
	    if($fp=fopen("$filename", "a"))
		{
		     
			 fputs( $fp,"\r\n\t\t      *************************************M-Health Error Log *************************************\r\n\n");
			 fputs( $fp,"\r\n\n$date ".$errorMessage);
             fclose( $fp );
		}		
       

	}	
	else       //log the error message
	{
	    
	    $fp=fopen( $filename, "a");		
        fputs( $fp, "$date ".$errorMessage."\n");
        fclose( $fp );	
	}
}




} // end class



?>