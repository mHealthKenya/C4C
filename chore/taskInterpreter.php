<?php    
function getTask($con,$task,$action,$mobile,$message,$names,$code,$service_id,$sysprocess_id,$unitsin,$sblood,$ublood,$usorted,$unitsout,$dtoday,$dsub_day,$datetime)
{
		  require_once("DbInterface.php");
		  $dbi=new DbInterface();
		 //check task  
		
		 if($task=="incoming") {
		 
				 if($action=="auto"){	
				$sys=$dbi->getSyscateg($con,$sysprocess_id);
				$syscateg=$sys[0];//stock
				$syssubcateg=$sys[1];//stock
				$sysresponse=$sys[2];//outmesssage
		
		/******************************************Start Custom Reply**************************************************************/
		
		      if($syscateg=="stock"){	
			       if($syssubcateg=="stock"){
				   $act="stock submission";
				   $out_msg=$sysresponse;				   
						  if($dtoday!=$dsub_day){
						  
						  $dbi->sendCustomReply($con,$mobile,$out_msg); 			  
				          $dbi->insert_into_stock($con,$names,$code,$datetime,$mobile,$unitsin,$sblood,$ublood,$usorted,$unitsout,$datetime);
                          }else{
						   //print "nko apa post";
						  $out_msg="Thank you for updating daily stocks.";
						  $dbi->sendCustomReply($con,$mobile,$out_msg); 			  
				          $dbi->update_stock($con,$names,$code,$datetime,$mobile,$unitsin,$sblood,$ublood,$usorted,$unitsout,$datetime);  
						  }
					}
				}      					
			}
		}
	}    
			
			
		/************End Custom Reply******************************/