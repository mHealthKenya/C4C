<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// require APPPATH . '/libraries/AfricasTalkingGateway.php';

class processor extends CI_Model {

    function saveMymsms($from, $to, $text, $date, $id, $linkId) {
        $save = array(
            'mobile_no' => $from,
            'shortCode' => $to,
            'msg' => $text,
            'date_fetched' => $date,
            'msgID' => $id,
            'LinkId' => $linkId
        );
        //Save to a text file if insert fails while debugging
        $this->db->insert('tbl_logs_inbox', $save);
    }

    function SearchCnty() {
        $query = "SELECT name,id FROM tbl_county WHERE id <= 47 ";
        return $this->db->query($query)->result_array();
    }

    function SearchSub($SubcntyDATA) {

        $cnty = $this->uri->segment(3, 0);
        // $cnty = $SubcntyDATA['cntyID'];
        if (!empty($cnty)) {

            $county = utf8_decode(urldecode($cnty));

            $returned_value = $this->db->get_where('tbl_sub_county', array('county_name' => $county))->result_array();
            $items = json_encode(array('result' => $returned_value));
            echo $items;
        }
    }

    function SearchFac($facDATA) {
        $cnty = $this->uri->segment(3, 0);
        // $cnty = $SubcntyDATA['cntyID'];
        if (!empty($cnty)) {

            $cnty = utf8_decode(urldecode($cnty));

            $returned_value = $this->db->get_where('tbl_master_facility', array('Sub_County_Name' => $cnty))->result_array();
            $items = json_encode(array('result' => $returned_value));
            echo $items;
        }
    }

//    function SearchSub($SubcntyDATA) {
//        echo 'hi';
//         $subcnty = $SubcntyDATA['subID'];
//         print_r($subcnty);
//        if (!empty($subcnty)) {
//            $returned_value = $this->db->get_where('tbl_sub_county', array('id' => $subcnty))->result_array();
//            
//            $items = json_encode($returned_value);
//            echo $items;
//        }
//    }
    function SearchFclty($faciltyDATA) {
        $subcnty = $faciltyDATA['mfl'];
        if (!empty($subcnty)) {
            $returned_value = $this->db->get_where('tbl_county', array('Sub_County_Name' => $cnty))->result_array();

            $items = json_encode(array('result' => $returned_value));
            echo $items;
        }
    }

    function Sms($from, $to, $text, $date, $id, $linkId) {
//        echo 'Shortcode => ' . $to;

        $t4aDB = $this->load->database('t4aDB', TRUE);
        $ushauriNewDB = $this->load->database('ushauriNewDB', TRUE);
        $t4aUshauriDB = $this->load->database('t4aUshauriDB', TRUE);
        $ushauriDB = $this->load->database('ushauriDB', TRUE);
        $mlabDB = $this->load->database('mlabDB', TRUE);
        $c4cliveDB = $this->load->database('c4cliveDB', TRUE);


        switch ($to) {
            case 40145:

                $save = array(
                    'mobile_no' => $from,
                    'shortCode' => $to,
                    'msg' => $text,
                    'date_fetched' => $date,
                    'msgID' => $id,
                    'LinkId' => $linkId
                );
                $c4cliveDB->insert('tbl_logs_inbox', $save);

                $task = 1;
                $this->data->task($task);

                break;
            case 40146:
                $save = array(
                    'source' => $from,
                    'destination' => $to,
                    'msg' => $text,
                    'date' => $date,
                    'msg_id' => $id,
                    'LinkId' => $linkId
                );
                $ushauriDB->insert('tbl_incoming', $save);

                $save = array(
                    'source' => $from,
                    'destination' => $to,
                    'msg' => $text,
                    'date' => $date,
                    'msg_id' => $id,
                    'LinkId' => $linkId
                );
                $ushauriNewDB->insert('tbl_incoming', $save);
                $task = 2;
                $this->data->task($task);

                break;


            case 40147:
                $save = array(
                    'MSISDN' => $from,
                    'shortCode' => $to,
                    'message' => $text,
                    'createdOn' => $date,
                    'message_id' => $id,
                    'LinkId' => $linkId
                );
                $mlabDB->insert('inbox', $save);

//                $task = 3;
//                $this->data->task($task);

                break;


            case 40148:
                $save = array(
                    'source' => $from,
                    'destination' => $to,
                    'msg' => $text,
                    'date_fetched' => $date,
                    'msg_id' => $id,
                    'LinkId' => $linkId
                );
                $t4aDB->insert('tbl_incoming', $save);
                $task = 4;
                $this->data->task($task);

                break;
            case 40149:
                $save = array(
                    'mobile_no' => $from,
                    'shortCode' => $to,
                    'msg' => $text,
                    'date_fetched' => $date,
                    'msgID' => $id,
                    'LinkId' => $linkId
                );
                $this->db->insert('tbl_logs_inbox', $save);

                $save = array(
                    'source' => $from,
                    'destination' => $to,
                    'msg' => $text,
                    'receivedtime' => $date,
                    'msg_id' => $id,
                    'LinkId' => $linkId
                );
                $t4aUshauriDB->insert('tbl_incoming', $save);
                $task = 5;
                $this->data->task($task);

                break;

            default:
                echo 'Oops, Error Encountered';
                break;
        }
    }

    function task($task) {
        switch ($task) {
            case 1:
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/c4c_backend/");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);
                echo 'Done task 1';
                break;

            case 2:
                //ushauri
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/ushauri/chore/receiver");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                //ushauri new
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/ushaurinew/chore/receiver");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                echo 'Done task 2';

                break;
            case 3:
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/c4c-test-BE");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                echo 'Done task 3';

                break;
            case 4:
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/t4a//chore/receiver");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                echo 'Done task 4';

                break;
            case 5:
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/t4aushauri/chore/receiver");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "http://localhost/c4c-test-BE/");
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);

                echo 'Done task 5';

                break;

            default:
                break;
        }
    }

//    function mhkSYS() {
//        $query = $this->db->query("SELECT id,mobile_no_msg FROM tbl_MHK_sys where status='1'")->result();
//        foreach ($query as $value) {
//            $id = $value->id;
//            $mobile_no = $value->mobile_no;
//            $msg = $value->msg;
//
//
//            $mobile = substr($mobile_no, -9);
//
//            if ($len < 10) {
//                $dest = "+254" . $mobile;
//            }
//            if ($dest <> '') {
//
//                $status = '2';
//                $query_update = $this->db->query("UPDATE tbl_MHK_sys SET status ='$status' where mobile_no='$mobile_no'");
//
//
//
//                $this->PostSMS($dest, $msg);
//            } else {
//                $out_put = " Reason: Phone number is missing";
//                return $out_put;
//            }
//        }

    function mhkAlert() {

        $query = $this->db->query("SELECT id,mobile_no,sys_id,f_name FROM tbl_MHK_sys where status='1'")->result();
        foreach ($query as $value) {
            $id = $value->id;
            $fname = $value->f_name;
            $sys_id = $value->sys_id;
            $mobile_no = $value->mobile_no;

            $query_2 = $this->db->query("SELECT messages,id FROM tbl_messages WHERE id='115'")->result();

            foreach ($query_2 as $value) {
                $text = $value->messages;
                $msg_id = $value->id;

                $Draft_msg = str_replace("XXX", $sys_id, $text);
                $msg = str_replace("YYY", $fname, $Draft_msg);

                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }
                if ($dest <> '') {
//update status to sent to stop loops
//                    $out_status = '1';
//                    $this->db->query("INSERT INTO tbl_mhkSYS (message_id,mobile_no,status,sys_id) VALUES ('$msg_id','$dest','$out_status','$sys_id')");
                    //call postsms fn to send messages
//                    echo 'Mobile =>'.$dest;
                    $this->PostSMS($dest, $msg);
                    $status = '2';
                    $this->db->query("UPDATE tbl_MHK_sys SET status ='$status' where mobile_no='$mobile_no'");

//                    $this->db->query("UPDATE tbl_mhkSYS SET status ='$status' where mobile_no='$dest'");
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function MHKsender() {

        $query = $this->db->query("SELECT id,message_id,mobile_no,STATUS FROM tbl_mhkSYS WHERE STATUS='1' ORDER BY id DESC")->result();
        foreach ($query as $value) {
            $id = $value->id;
            $messages_id = $value->message_id;
            $mobile_no = $value->mobile_no;

//insert HCW name into text
            $query_msgID = $this->db->query("SELECT messages,id,sys_id FROM tbl_messages WHERE id='114'")->result();
            foreach ($query_msgID as $msg_ID) {
                $text = $msg_ID->messages;
                $Hello = strpos($text, 'Hello', 0);
                $welcome = strpos($text, 'Welcome', 0);
                $Hi = strpos($text, 'Hi', 0);
                $Dear = strpos($text, 'Dear', 0);


//                  

                $query_name = $this->db->query("SELECT f_name,mobile_no,sys_id FROM tbl_MHK_sys  WHERE mobile_no='$mobile_no'")->result();
                foreach ($query_name as $nm) {
                    $fname = $nm->f_name;
                    $sys_id = $nm->sys_id;
//substr_replace(string,replacement,start,length)

                    $Draft_msg = str_replace("XXX", $sys_id, $text);
                    $msg = str_replace("YYY", $fname, $Draft_msg);
//                        $Draft_msg = substr_replace($text, $sys_id, 7, 0);

                    echo $msg = substr_replace($text, $fname, 5, 0);
                    exit();
                }


                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }

                if ($dest <> '') {
                    //call sender api fn to send messages
//                   $this->sender_api($dest, $msg);
                    $this->PostSMS($dest, $msg);
                    //update status to sent to stop loops.
                    $status = '2';
                    $query_update = $this->db->query("UPDATE tbl_mhkSYS SET STATUS ='$status' where mobile_no='$mobile_no'");
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function PostSMS($dest, $msg) {
        // echo "ndani hapa" .$dest ."<br>".$msg;        
        //Africa's Talking Library.
        // require_once '/opt/lampp/htdocs/c4c-dev/application/libraries/AfricasTalkingGateway.php';
        $this->load->library('AfricasTalkingGateway');


        //Africa's Talking API key and username.
        $username = 'mhealthkenya';
        $apikey = '9318d173cb9841f09c73bdd117b3c7ce3e6d1fd559d3ca5f547ff2608b6f3212';

        //Shortcode.
        $from = "40145";

        $gateway = new AfricasTalkingGateway($username, $apikey);
        try {
            $results = $gateway->sendMessage($dest, $msg, $from);
            // echo 'Great,SMS sent';
        } catch (GatewayException $e) {
            echo "Oops an error encountered while sending: " . $e->getMessage();
        }
    }

    //fetch county,s_county and facilities api to
    function get_facility_info() {
        $query = "SELECT tmf.code,tmf.name AS facility_name,tmf.county_id,tmf.Sub_County_ID,c.name AS county_name,sc.name AS subcounty_name FROM tbl_master_facility tmf,tbl_sub_county sc,tbl_county c WHERE tmf.county_id=c.id AND tmf.Sub_County_ID=sc.id";
        return $this->db->query($query)->result_array();
    }

    function SearchMobile($Mno) {


        $MobileNo = $Mno['mobile_no'];
        if (!empty($MobileNo)) {
            // echo 'Number  => ' . $MobileNo;

            $mobile = substr($MobileNo, 1);
            $len = strlen($mobile);

            if ($len < 10) {

                $mobile_no = "+254" . $mobile;
                // echo 'Concat ' . $mobile_no;             
            } else {
                $mobile_no = $MobileNo;
                // echo 'umber  oncat ' . $mobile_no;
            }
            $myNo = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no));
            if ($myNo->num_rows() > 0) {

                $data = $myNo->result_array();

                $result = [];

                $result["result"] = $data;

                echo json_encode($result);
            } else {
                echo 'NotFound';
            }
        } else {
            echo "Invalid Mobile Number";
        }
        //Check Broadcast Rights
        $this->IsFacilityUser($mobile_no);
    }

    //New Signup android
    function RegAppFac($SignUp) {
        $mydob = $SignUp['DOB'];

        $date = str_replace('/', '-', $mydob);
        $dob = date('Y-m-d', strtotime($date));

        $partner = $SignUp['partner_id'];
        $mobileNO = $SignUp['mobile_no'];

        if (!empty($mobileNO)) {

            $mobile = substr($mobileNO, 1);



            $len = strlen($mobile);

            if ($len < 10) {
                $mobile_no = "+254" . $mobile;
            } else {
                $mobile_no = $mobileNO;
            }



            $facility_id = $SignUp['facility_id'];


             if (!is_numeric($facility_id)) {

                 $getMFL = $this->db->get_where('tbl_master_facility', array('name' => $facility_id));
            if ($getMFL->num_rows() > 0) {
                    foreach ($getMFL->result() as $value) {
                        $mflID = $value->code;
                    }
                }
            } else {
                $mflID = $facility_id;
           }

            $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->num_rows();


            if ($check_existence == 0) {

                $DOB = array('DOB' => $dob);
                $newMobile = array('mobile_no' => $mobile_no);
                $AddMFL = array('facility_id' => $mflID);
                $AddDOB = array_merge($DOB, $AddMFL);
                $withDOB = array_merge($newMobile, $AddDOB);
                $Marry = array_merge($SignUp, $withDOB);

                $insert = $this->db->insert('tbl_patientdetails', $Marry);
                if ($insert) {
                    // $mno = $SignUp['mobile_no'];    

                    $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();


                    foreach ($getMOB as $value) {

                        $hcw_id = $value['id'];

                        $array = explode("+", $partner);
                        foreach ($array as $key => $value) {
                            switch ($value) {
                                case 1:
                                    $partner = 1;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 2:
                                    $partner = 2;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 3:
                                    $partner = 3;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 4:
                                    $partner = 4;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 5:
                                    $partner = 5;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 6:
                                    $partner = 6;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 7:
                                    $partner = 7;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 8:
                                    $partner = 8;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 9:
                                    $partner = 9;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                default:
                                    break;
                            }
                        }
                    }
                }
                echo 'Welldone';
                //send connfirmatory sms once registration is successfull
                //                $this->android_confirmatory_message_outbox($mobile_no);


                //Check Broadcast Rights
                //$this->IsFacilityUser($mobile_no);
            } else {


                $DOB = array('DOB' => $dob);
                $newMobile = array('mobile_no' => $mobile_no);
                $AddMFL = array('facility_id' => $mflID);
                $AddDOB = array_merge($DOB, $AddMFL);
                $withDOB = array_merge($newMobile, $AddDOB);
                $Marry = array_merge($SignUp, $withDOB);

                $this->db->where('mobile_no', $mobile_no);
                $this->db->update('tbl_patientdetails', $Marry);

                $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();

                // foreach ($getMOB as $value) {
                //    $hcw_id = $value['id'];
                // $array = explode("+", $partner);
                //             foreach ($array as $key => $value) {
                //                 switch ($value) {
                //                     case 1:
                //                         $partner = 1;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 2:
                //                         $partner = 2;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 3:
                //                         $partner = 3;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 4:
                //                         $partner = 4;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 5:
                //                         $partner = 5;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 6:
                //                         $partner = 6;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 7:
                //                         $partner = 7;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 8:
                //                         $partner = 8;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 9:
                //                         $partner = 9;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     default:
                //                         break;
                //                 }
                //             }          
                //         }
                // echo 'ClientUpdated';
                //Check Broadcast Rights
                // $this->IsFacilityUser($mobile_no);
            }
        //        } else {
        //          echo 'Invalid Mobile Number';
            //    }
    }
}

    //New Signup android
    function SignupReg($SignUp) {
        $mydob = $SignUp['DOB'];

        $date = str_replace('/', '-', $mydob);
        $dob = date('Y-m-d', strtotime($date));

        $partner = $SignUp['partner_id'];
        $mobileNO = $SignUp['mobile_no'];

        if (!empty($mobileNO)) {

            $mobile = substr($mobileNO, 1);



            $len = strlen($mobile);

            if ($len < 10) {
                $mobile_no = "+254" . $mobile;
            } else {
                $mobile_no = $mobileNO;
            }

            $facility_id = $SignUp['facility_id'];

            if (is_string($facility_id)) {

                $getMFL = $this->db->get_where('tbl_master_facility', array('name' => $facility_id));

                if ($getMFL->num_rows() > 0) {
                    foreach ($getMFL->result() as $value) {
                        $mflID = $value->code;
                    }
                }
            } else {
                $mflID = $facility_id;
            }

            $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->num_rows();


            if ($check_existence == 0) {

                $DOB = array('DOB' => $dob);
                $newMobile = array('mobile_no' => $mobile_no);
                $AddMFL = array('facility_id' => $mflID);
                $AddDOB = array_merge($DOB, $AddMFL);
                $withDOB = array_merge($newMobile, $AddDOB);
                $Marry = array_merge($SignUp, $withDOB);

                $insert = $this->db->insert('tbl_patientdetails', $Marry);
                if ($insert) {
                    // $mno = $SignUp['mobile_no'];    

                    $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();


                    foreach ($getMOB as $value) {

                        $hcw_id = $value['id'];

                        $array = explode("+", $partner);
                        foreach ($array as $key => $value) {
                            switch ($value) {
                                case 1:
                                    $partner = 1;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 2:
                                    $partner = 2;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 3:
                                    $partner = 3;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 4:
                                    $partner = 4;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 5:
                                    $partner = 5;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 6:
                                    $partner = 6;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 7:
                                    $partner = 7;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 8:
                                    $partner = 8;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                case 9:
                                    $partner = 9;
                                    $this->SavePtnrID($hcw_id, $partner);
                                    break;
                                default:
                                    break;
                            }
                        }
                    }
                }
                //send connfirmatory sms once registration is successfull
                $this->android_confirmatory_message_outbox($mobile_no);
                // echo 'Welldone';
                //Check Broadcast Rights
                $this->IsFacilityUser($mobile_no);
            } else {


                $DOB = array('DOB' => $dob);
                $newMobile = array('mobile_no' => $mobile_no);
                $AddMFL = array('facility_id' => $mflID);
                $AddDOB = array_merge($DOB, $AddMFL);
                $withDOB = array_merge($newMobile, $AddDOB);
                $Marry = array_merge($SignUp, $withDOB);

                $this->db->where('mobile_no', $mobile_no);
                $this->db->update('tbl_patientdetails', $Marry);

                $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();

                // foreach ($getMOB as $value) {
                //    $hcw_id = $value['id'];
                // $array = explode("+", $partner);
                //             foreach ($array as $key => $value) {
                //                 switch ($value) {
                //                     case 1:
                //                         $partner = 1;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 2:
                //                         $partner = 2;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 3:
                //                         $partner = 3;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 4:
                //                         $partner = 4;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 5:
                //                         $partner = 5;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 6:
                //                         $partner = 6;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 7:
                //                         $partner = 7;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 8:
                //                         $partner = 8;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     case 9:
                //                         $partner = 9;
                //                         $this->UpdtPtnrID($hcw_id, $partner);
                //                         break;
                //                     default:
                //                         break;
                //                 }
                //             }          
                //         }
                // echo 'ClientUpdated';
                //Check Broadcast Rights
                // $this->IsFacilityUser($mobile_no);
            }
        } else {
            echo 'Invalid Mobile Number';
        }
    }

    //New Signup android
    // function RegAppTest($SignUp) {
    //     $partner = $SignUp['partner_id'];
    //     $mobileNO = $SignUp['mobile_no'];
    //     $mobile = substr($mobileNO, -9);
    //     $len = strlen($mobile);
    //     if ($len < 10) {
    //         $mobile_no = "+254" . $mobile;
    //     } else {
    //         $mobile_no = $mobileNO;
    //     }
    //     $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->num_rows();
    //     if ($check_existence == 0) {
    //         $insert = $this->db->insert('tbl_patientdetails', $SignUp);
    //         if ($insert) {
    //             // $mno = $SignUp['mobile_no'];    
    //             $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();
    //             foreach ($getMOB as $value) {
    //                 $hcw_id = $value['id'];
    //                 $array = explode("+", $partner);
    //                 foreach ($array as $key => $value) {
    //                     switch ($value) {
    //                         case 1:
    //                             $partner = 1;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 2:
    //                             $partner = 2;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 3:
    //                             $partner = 3;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 4:
    //                             $partner = 4;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 5:
    //                             $partner = 5;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 6:
    //                             $partner = 6;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 7:
    //                             $partner = 7;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 8:
    //                             $partner = 8;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         case 9:
    //                             $partner = 9;
    //                             $this->SavePtnrID($hcw_id, $partner);
    //                             break;
    //                         default:
    //                             break;
    //                     }
    //                 }
    //             }
    //         }
    //         //send connfirmatory sms once registration is successfull
    //         $this->android_confirmatory_message_outbox($mobile_no);
    //         echo 'Welldone';
    //     } else {
    //         $this->db->where('mobile_no', $mobile_no);
    //         $this->db->update('tbl_patientdetails', $SignUp);
    //         $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();
    //         // foreach ($getMOB as $value) {
    //         //    $hcw_id = $value['id'];
    //         // $array = explode("+", $partner);
    //         //             foreach ($array as $key => $value) {
    //         //                 switch ($value) {
    //         //                     case 1:
    //         //                         $partner = 1;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 2:
    //         //                         $partner = 2;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 3:
    //         //                         $partner = 3;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 4:
    //         //                         $partner = 4;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 5:
    //         //                         $partner = 5;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 6:
    //         //                         $partner = 6;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 7:
    //         //                         $partner = 7;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 8:
    //         //                         $partner = 8;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     case 9:
    //         //                         $partner = 9;
    //         //                         $this->UpdtPtnrID($hcw_id, $partner);
    //         //                         break;
    //         //                     default:
    //         //                         break;
    //         //                 }
    //         //             }          
    //         //         }
    //         echo 'ClientUpdated';
    //     }
    // }
    //Create  android user Profile
    function RegApp($SignUp) {
        //        $mobile_no = $SignUp['mobile_no'];

        $mobileNO = $SignUp['mobile_no'];

        $mobile = substr($mobileNO, -9);
        $len = strlen($mobile);

        if ($len < 10) {
            $mobile_no = "+254" . $mobile;
        //            echo 'umber  oncat ' . $mobile_no;
        } else {
            $mobile_no = $mobileNO;
            // echo 'Number  without cncat ' . $mobile_no;
        }


        $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->num_rows();
        $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $mobile_no))->result_array();
        if ($check_existence == 0) {

            $AddMobileNO = array('mobile_no' => $mobile_no);
            $joinProfille = array_merge($SignUp, $AddMobileNO);

            $insert = $this->db->insert('tbl_patientdetails', $joinProfille);
            if ($insert) {
                //$mno = $SignUp['mobile_no'];
                //send connfirmatory sms upon successfull registration
        //                $this->android_confirmatory_message_outbox($mno);
                // echo 'Welldone';
            } else {
                echo 'Failed ';
            }
        } else {

            foreach ($getMOB as $value) {
                $mno = $value['mobile_no'];
                if ($mno == $mobile_no) {
                    echo 'Oops , Client exists!';
                }
            }
        }
    }

    function CreateProfTest($Prof) {
        $mobile_no = $Prof['mobile_no'];

        echo 'Hapa Ndani ' . $mobile_no;

//        exit;
//        $mobile = substr($mobileNO, -9);
//        $len = strlen($mobile);
//
//        if ($len < 10) {
//            $mobile_no = "+254" . $mobile;
//        } else if ($len == 13) {
//            $mobile_no = $mobile;
//        }
//
//        echo 'mob ' . $mobile_no;


        $cadre = $Prof['cadre_id'];
//        if (is_string($cadree)) {
//            $cadre = $cadree;
//        } else {
//            $cadre = $cadree;
//        }
//        $elocation = $andrd_APP[0];
//
//                                if (is_string($elocation)) {
//                                    $Othrlocation = $elocation;
//                                }
//                                $location = 9;

        $mydob = $Prof['DOB'];
        $date = str_replace('/', '-', $mydob);
        $dob = date('Y-m-d', strtotime($date));

        $query_a = $this->db->query("select * from tbl_patientdetails where  mobile_no='$mobile_no'");
        if ($query_a->num_rows() > 0) {

            $AddId = array('DOB' => $dob);
            $AddCadre = array('cadre_id' => $cadre);
            $joinCadre = array_merge($Prof, $AddCadre);
            $joinArry = array_merge($Prof, $joinCadre);

            $this->db->where('mobile_no', $mobile_no);
            $this->db->update('tbl_patientdetails', $joinArry);
            // $this->db->insert('tbl_TespProf', $Prof);
            echo 'Success, Profile Updated!';
        } else {
            echo 'Oops, Sign up first!';
        }
    }

    function CreateProf($Prof) {
        $mobileNO = $Prof['mobile_no'];

        $facility_id = $Prof['facility_id'];

        if (is_string($facility_id)) {

            $getMFL = $this->db->get_where('tbl_master_facility', array('name' => $facility_id));

            if ($getMFL->num_rows() > 0) {
                foreach ($getMFL->result() as $value) {
                    $mflID = $value->code;
                }
            }
        } else {
            $mflID = $facility_id;
        }

        $mobile = substr($mobileNO, -9);
        $len = strlen($mobile);

        if ($len < 10) {
            $mobile_no = "+254" . $mobile;
//            echo 'Number  oncat ' . $mobile_no;
        } else {
            $mobile_no = $mobileNO;
//            echo 'Number  without cncat ' . $mobile_no;
        }

//        exit;
//        $cadree = $Prof['cadre_id'];
//        if (is_string($cadree)) {
//            $cadre = $cadree;
//        } else {
//            $o = $cadree;
//        }

        $mydob = $Prof['DOB'];
        $date = str_replace('/', '-', $mydob);
        $dob = date('Y-m-d', strtotime($date));

        $query_a = $this->db->query("select * from tbl_patientdetails where  mobile_no='$mobile_no'");
        if ($query_a->num_rows() > 0) {

            $AddId = array('dob' => $dob);
            $mflCode = array('facility_id' => $mflID);
//            $AddCadre = array('cadre_id' => $cadre);
//            $joinCadre = array_merge($Prof, $AddCadre);
            $AddMMFL = array_merge($Prof, $mflCode);

            $joinArry = array_merge($AddMMFL, $AddId);

            $AddMobileNO = array('mobile_no' => $mobile_no);
            $joinProfille = array_merge($joinArry, $AddMobileNO);

            $this->db->where('mobile_no', $mobile_no);
            $this->db->update('tbl_patientdetails', $joinProfille);
            // $this->db->insert('tbl_TespProf', $Prof);
            echo 'Success, Profile Updated!';
        } else {
            echo 'Oops, Sign up first!';
        }
    }

    //Process Exposure Reports
    function RptExp($Rpt) {
//        $mno = $Rpt['mobile_no'];
        $mobileNO = $Rpt['mobile_no'];

        if (!empty($mobileNO)) {

            $mobile = substr($mobileNO, 1);
            $len = strlen($mobile);

            if ($len < 10) {
                $mno = "+254" . $mobile;
//            echo 'Number  oncat ' . $mobile_no;
            } else {
                $mno = $mobileNO;
//            echo 'Number  without cncat ' . $mobile_no;
            }


            $current_time = date("Y-m-d H:i:s");
            $datetime = strtotime("now");

            $dateofpep = $Rpt['dateofexposure'];
            $rdate = str_replace('/', '-', $dateofpep);
            $dateofexposure = date('Y-m-d H:i:s', strtotime($rdate));


//        $pepdate = str_replace('/', '-', $pepinitdate);
//        $dateofpepinit = date('Y-m-d H:i:s', strtotime($pepdate));

            $report_date = strtotime($rdate);
            $no_after = $datetime - $report_date;
//        $ddays = $no_after / 86400;
//        $r_days = round($ddays);
            $hours = round($no_after / ( 3600));
            //print_r($hours);
            //exit();


            if ($hours >= 72) {
                $text = 71;
                $this->android_complete_report($mno, $text);
            } else if ($hours < 72) {
                $text = 9;
                $this->android_complete_report($mno, $text);
            }
            array_pop($Rpt);
//        print_r($Rpt);

            $queryone = $this->db->query("select * from tbl_patientdetails where mobile_no='$mno'");
            if ($queryone->num_rows() > 0) {
                $mobile_no = $queryone->result_array();
                foreach ($mobile_no as $x) {
                    $mob_no = $x['mobile_no'];
                    $id = $x['id'];

                    $AddId = array('p_details_id' => $id);
                    $Marry = array_merge($Rpt, $AddId);
//                print_r($Marry);

                    $tbl_reports = $this->db->query("select p_details_id,exposure_hours,exposure_type,exposure_location,adherence_level,date_exposed from tbl_reports where p_details_id='$id'");
                    //Not exposed before
                    if ($tbl_reports->num_rows() > 0) {
//                    $reports = $tbl_reports->result();
//                    foreach ($reports as $key) {
//                        
//                    }
                        //$insert = $this->db->insert('tbl_reports', $Rpt);
                        $this->db->where('p_details_id', $id);
                        $update = $this->db->update('tbl_reports', $Marry);
                        $insert = $this->db->insert('tbl_reports_all', $Marry);
                        echo 'Success, Exposure Updated!';
                        //Re-exposed 
                    } else {

                        $insert = $this->db->insert('tbl_reports_all', $Marry);
                        $insert = $this->db->insert('tbl_reports', $Marry);

                        echo 'Success, Exposure Inserted!';
                    }
                }
            } else {
                echo 'Oops, Create a profile first!';
            }
        } else {
            echo 'Invalid Mobile Number';
        }
    }

    //Process Exposure Reports
    function RptExpTest($Rpt) {
        $mno = $Rpt['mobile_no'];

        $mno = $Rpt['exposure_location'];
        $mno = $Rpt['exposure_type'];
        $mno = $Rpt['purpose'];
        $mno = $Rpt['whenithapnd'];
        $mno = $Rpt['HivStatus'];
        $mno = $Rpt['numberofexposures'];
        $mno = $Rpt['device'];
        $mno = $Rpt['mobile_no'];
        $mno = $Rpt['mobile_no'];
        $mno = $Rpt['mobile_no'];
        $mno = $Rpt['mobile_no'];




        $cadree = $Prof['cadre_id'];
        if (is_string($cadree)) {
            $cadre = 9;
        } else {
            $cadre = $cadree;
        }




        $current_time = date("Y-m-d H:i:s");
        $datetime = strtotime("now");

        $dateofpep = $Rpt['dateofexposure'];
        $rdate = str_replace('/', '-', $dateofpep);
        $dateofexposure = date('Y-m-d H:i:s', strtotime($rdate));


//        $pepdate = str_replace('/', '-', $pepinitdate);
//        $dateofpepinit = date('Y-m-d H:i:s', strtotime($pepdate));

        $report_date = strtotime($rdate);
        $no_after = $datetime - $report_date;
//        $ddays = $no_after / 86400;
//        $r_days = round($ddays);
        $hours = round($no_after / ( 3600));
        //print_r($hours);
        //exit();


        if ($hours >= 72) {
            $text = 71;

            $this->android_complete_report($mno, $text);
        } else if ($hours < 72) {
            $text = 9;
            $this->android_complete_report($mno, $text);
        }
        array_pop($Rpt);
//        print_r($Rpt);

        $queryone = $this->db->query("select * from tbl_patientdetails where  mobile_no='$mno'");
        if ($queryone->num_rows() > 0) {
            $mobile_no = $queryone->result_array();
            foreach ($mobile_no as $x) {
                $mob_no = $x['mobile_no'];
                $id = $x['id'];

                $AddId = array('p_details_id' => $id);
                $Marry = array_merge($Rpt, $AddId);
//                print_r($Marry);

                $tbl_reports = $this->db->query("select p_details_id,exposure_hours,exposure_type,exposure_location,adherence_level,date_exposed from tbl_reports where p_details_id='$id'");
                //Not exposed before
                if ($tbl_reports->num_rows() > 0) {
//                    $reports = $tbl_reports->result();
//                    foreach ($reports as $key) {
//                        
//                    }
                    //$insert = $this->db->insert('tbl_reports', $Rpt);
                    $this->db->where('p_details_id', $id);
                    $update = $this->db->update('tbl_reports', $Marry);
                    $insert = $this->db->insert('tbl_reports_all', $Marry);
                    echo 'Success, Exposure Inserted!';
                    //Re-exposed 
                } else {

                    $insert = $this->db->insert('tbl_reports_all', $Marry);
                    $insert = $this->db->insert('tbl_reports', $Marry);

                    echo 'Success, Exposure Updated!';
                }
            }
        } else {
            echo 'Oops, Create a profile first!';
        }
    }

//Check if android username and password match 
    function Login($Login) {
        $uname = $Login['username'];
        $pwd = $Login['password'];

        $query_a = $this->db->query("select username,password from tbl_patientdetails where  username='$uname' and password='$pwd' ");
        if ($query_a->num_rows() >= 1) {
            echo 'Success, user exists';
        } else {
            echo 'Oops, User not found';
        }
    }

    //Android API For partners
    function getPartners() {
        $query = "SELECT id,name from tbl_partners";
        return $this->db->query($query)->result_array();
    }

    function syncREGandSMS() {
        $dwh_db = $this->load->database('post_C4C', TRUE);
        $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $getDWH = $dwh_db->query('select max(client_id) as client_id from tbl_smslogs');
        foreach ($getDWH->result_array() as $value) {
            $current_id = $value['client_id'];
//                print_r($current_id); 

            $getnewid = $this->db->query("select * from tbl_sentandreceivedsms where client_id > '$current_id'");
            foreach ($getnewid->result_array() as $data) {
                $hcw_id = $data['client_id'];
                $updated_at = $data['updated_at'];
                $addedOn = $data['date_registered'];
                $sentsms = $data['sentsms'];

                if ($updated_at == $addedOn) {
//                    $leo = date("Y-m-d");
//                    print_r($leo);
                    echo 'Inserted client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $addedOn . ' sent SMS ' . $sentsms . '<br>';
                    $dwh_db->insert('tbl_smslogs', $data);
                } else {
                    echo 'Updated client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $sentsms . ' sent SMS ' . $sentsms . '<br>';
                    $dwh_db->where('client_id', $hcw_id);
                    $dwh_db->update('tbl_smslogs', $data);
                }
            }
        }
        //Sync Exposures.

        $this->syncExposures();
    }

    function syncRawData() {
        // $dwh_db = $this->load->database('post_C4C', TRUE);
        // $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $getDWH = $this->db->query('select max(client_id) as client_id from tbl_rawdata limit 1');
        foreach ($getDWH->result_array() as $value) {
            $current_id = $value['client_id'];
//                print_r($current_id); 

            $getnewid = $this->db->query("select * from tbl_clients where client_id > '$current_id'");
            foreach ($getnewid->result_array() as $data) {
                $hcw_id = $data['client_id'];
                $updated_at = $data['updated_at'];
                $addedOn = $data['date_registered'];
                $sentsms = $data['sentsms'];

                if ($updated_at == $addedOn) {
//                    $leo = date("Y-m-d");
//                    print_r($leo);
                    echo 'Inserted client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $addedOn . ' sent SMS ' . $sentsms . '<br>';
                    $this->db->insert('tbl_rawdata', $data);
                } else {
                    echo 'Updated client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $sentsms . ' sent SMS ' . $sentsms . '<br>';
                    $this->db->where('client_id', $hcw_id);
                    $this->db->update('tbl_rawdata', $data);
                }
            }
        }
        //Sync Exposures.
        // $this->syncExposures();
    }

    function syncExposures() {

        $dwh_db = $this->load->database('post_C4C', TRUE);
        $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $getDWH = $dwh_db->query('select max(client_id) as client_id from tbl_exposures');
        foreach ($getDWH->result_array() as $value) {
            $current_id = $value['client_id'];
//            print_r($current_id);

            $getnewid = $this->db->query("select * from tbl_exposure_report where client_id > '$current_id'");
            foreach ($getnewid->result_array() as $data) {

                $hcw_id = $data['client_id'];
                $updated_at = $data['updated_at'];
                $addedOn = $data['created_at'];

//                print_r($hcw_id);
                // $sentsms = $data['sentsms'];

                if ($updated_at == $addedOn) {
//                    $leo = date("Y-m-d");
                    // print_r($hcw_id);
//                     echo 'Added client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $addedOn . ' sent SMS ' . $sentsms . '<br>';
                    $weka = $dwh_db->insert('tbl_exposures', $data);
                    if ($weka) {
                        echo "Success,IDs yao " . $hcw_id . "</br>";
                    } else {
                        echo "Error occured with the sync";
                    }
                } else {
                    echo 'Updated client ID =>  ' . $hcw_id . ' Updated At ' . $updated_at . ' Added On ' . $sentsms . ' sent SMS ' . $sentsms . '<br>';
                    $dwh_db->where('client_id', $hcw_id);
                    $dwh_db->update('tbl_exposures', $data);
                }
            }
        }
    }

    function syncExposuress() {
        $dwh_db = $this->load->database('syncData', TRUE);
        $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
//Insert new data
        $getDWH = $dwh_db->query('select max(client_id) as client_id from tbl_exposures_new ');
        if ($getDWH->num_rows() > 0) {
            foreach ($getDWH->result() as $value) {
                $current_id = $value->client_id;
                $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                $getnewid = $c4c_db->query("select * from tbl_exposure_report where client_id > '$current_id'");
                if ($getnewid->num_rows() > 0) {
                    foreach ($getnewid->result() as $value) {
                        $id = $value->client_id;
                        $reg_status = $value->reg_status;
                        $national_id = $value->national_id;
                        $first_name = $value->first_name;
                        $last_name = $value->last_name;
                        $dob = $value->dob;
                        $date_registered = $value->date_registered;
                        $age = $value->age;
                        $enrollment_date = $value->enrollment_date;
                        $age_group = $value->age_group;
                        $gender = $value->gender;
                        $cadre = $value->cadre;
                        $mfl_no = $value->mfl_no;
                        $date_registered = $value->date_registered;
                        $hepatitsb_status = $value->hepatitsb_status;
                        $facility = $value->facility;
                        $sub_county = $value->sub_county;
                        $county = $value->county;
                        $facility_level = $value->facility_level;
                        $receivedsms = $value->receivedsms;
                        $age_group = $value->age_group;
                        $sentsms = $value->sentsms;
                        $mobile_no = $value->mobile_no;
                        $categ_name = $value->categ_name;

//                        echo 'Inserted client ID  ' . $id . '<br>';

                        $data = array(
                            'client_id' => $id,
                            'reg_status' => $reg_status,
                            'national_id' => $national_id,
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'dob' => $dob,
                            'age' => $age,
                            'enrollment_date' => $enrollment_date,
                            'age_group' => $age_group,
                            'gender' => $gender,
                            'cadre' => $cadre,
                            'mfl_no' => $mfl_no,
                            'date_registered' => $date_registered,
                            'hepatitsb_status' => $hepatitsb_status,
                            'facility' => $facility,
                            'sub_county' => $sub_county,
                            'county' => $county,
                            'facility_level' => $facility_level,
                            'receivedsms' => $receivedsms,
                            'sentsms' => $sentsms,
                            'mobile_no' => $mobile_no,
                            'categ_name' => $categ_name
                        );
//                        $dwh_db->where('client_id', $id);
//                        $dwh_db->update('tbl_smslogs_new', $data);
                        $dwh_db->insert('tbl_smslogs_new', $data);
                    }
                }
            }
        }
//Update existing data
        $getDWH = $dwh_db->query('select (client_id) as client_id from tbl_exposures ');
        if ($getDWH->num_rows() > 0) {
            foreach ($getDWH->result() as $value) {
                $current_id = $value->client_id;
                $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                $getnewid = $c4c_db->query("SELECT * FROM tbl_exposure_report WHERE client_id='$current_id' and date_exposed BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE()");
                if ($getnewid->num_rows() > 0) {
                    foreach ($getnewid->result() as $value) {
                        $id = $value->client_id;
                        $reg_status = $value->reg_status;
                        $national_id = $value->national_id;
                        $first_name = $value->first_name;
                        $last_name = $value->last_name;
                        $dob = $value->dob;
                        $date_registered = $value->date_registered;
                        $age = $value->age;
                        $enrollment_date = $value->enrollment_date;
                        $age_group = $value->age_group;
                        $gender = $value->gender;
                        $cadre = $value->cadre;
                        $mfl_no = $value->mfl_no;
                        $date_registered = $value->date_registered;
                        $hepatitsb_status = $value->hepatitsb_status;
                        $facility = $value->facility;
                        $sub_county = $value->sub_county;
                        $county = $value->county;
                        $facility_level = $value->facility_level;
                        $receivedsms = $value->receivedsms;
                        $age_group = $value->age_group;
                        $sentsms = $value->sentsms;
                        $mobile_no = $value->mobile_no;
                        $categ_name = $value->categ_name;

                        echo 'Todays client ID  ' . $id . '<br>';

                        $data = array(
                            'reg_status' => $reg_status,
                            'national_id' => $national_id,
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'dob' => $dob,
                            'age' => $age,
                            'enrollment_date' => $enrollment_date,
                            'age_group' => $age_group,
                            'gender' => $gender,
                            'cadre' => $cadre,
                            'mfl_no' => $mfl_no,
                            'date_registered' => $date_registered,
                            'hepatitsb_status' => $hepatitsb_status,
                            'facility' => $facility,
                            'sub_county' => $sub_county,
                            'county' => $county,
                            'facility_level' => $facility_level,
                            'receivedsms' => $receivedsms,
                            'sentsms' => $sentsms,
                            'mobile_no' => $mobile_no,
                            'categ_name' => $categ_name
                        );

                        $dwh_db->where('client_id', $id);
                        $dwh_db->update('tbl_smslogs_new', $data);
                        //$dwh_db->insert('tbl_smslogs_new', $data);
                    }
                }
            }
        }
    }

    function receiver_processor() {


//Main Function that processes input to tbl_logs_inbox
        $queryone = $this->db->query("SELECT mobile_no,level,date_received,msg,sms_status,id FROM tbl_logs_inbox WHERE sms_status='1' ORDER BY id ASC");
        if ($queryone->num_rows() > 0) {
            $mobile_no = $queryone->result();
            foreach ($mobile_no as $x) {

                $mno = $x->mobile_no;
                $level = $x->level;
                $new_level = $level + 1;
                $message_id = $new_level + 1;
                $m_text = $x->msg;
//Remove whitespaces.
//$text=preg_replace('/[^0-9a-zA-Z_]/',"",$m_text);
                $text = preg_replace('/\s\s+/', ' ', $m_text);
                $a_explode = explode("*", $m_text);

                $reg_rep_uc = $a_explode[0];
                $reg_rep_android = strtoupper($reg_rep_uc);


                //check if mobile number exists on tbl_staffdetails-The mobile number that sent a broadcast message.
                if ($this->CheckFacility($mno) == "empty" && $reg_rep_android == "BM") {
                    //A user who is not a facility admin get notified when he/she tries to create a broadcast message
                    $msg_id = 112;
                    $this->insert_to_outbox($mno, $msg_id);
                    // echo 'Inserted to  tbl_logs_outbox- text; Send pep to start reg';
                }
                if ($this->CheckFacility($mno) == "exists" && $reg_rep_android == "BM") {
                    $pick_Level = $this->CheckUserLevel($mno);
                    foreach ($pick_Level as $value) {



                        $user_level = $value->user_level;
                        $county = $value->county;
                        $scounty = $value->sub_county;
                        $facility = $value->facility;
                        if ($user_level != 5) {
                            $msg_id = 112;
                            $this->insert_to_outbox($mno, $msg_id);
                        } elseif ($user_level == 5) {
                            $current_time = date("Y-m-d H:i:s");
                            $finalText = base64_decode($text);


                            $Brdcst = explode("*", $finalText);
                            $bText = $Brdcst[1];
                            $sendDate = $Brdcst[2];
                            $cadre = $Brdcst[3];
                            $bname = $Brdcst[4];

                            $this->InsertTblBroadcastTable($county, $scounty, $facility, $bname, $cadre, $bText, $sendDate);
                            $msg_id = 113;
                            $this->insert_to_outbox($mno, $msg_id);
                            // echo 'Inserted to  tbl_sms_broadcast';                    
                        }
                    }
                }
                if ($this->CheckFacility($mno) == "exists" && $reg_rep_android == "YES" || $reg_rep_android == "NO") {
                    $Sup = $this->getSuperVisor($mno);
                    foreach ($Sup as $m) {
                        $SupNumber = $m->user_mobile;
                        $SupMfl = $m->facility;

                        $student = $this->getStudent($SupMfl);
                        foreach ($student as $m) {
                            $CheckInTime = $m->checkin_time;
                            $StudMfl = $m->facility_id;
                            $StudId = $m->id;


                            $date_sent = strtotime($CheckInTime);
                            $datetime = strtotime("now");

                            $substract = $datetime - $date_sent;
                            $r_minutes = $substract / 60;
                            //$seconds=$substract/60000;        
                            $minutes = round($r_minutes);


                            if ($SupMfl == $StudMfl) {
                                if ($minutes < 5) {
                                    // echo 'This=>' . " " . $CheckInTime . "  " . $StudId . "<br>";
                                    //Process Confirmation from the supervisor
                                    $this->UpdateCheckIn($StudMfl, $reg_rep_android, $StudId, $CheckInTime);
                                }
                            }
                        }
                    }
                }
                if ($this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android == "SU") {
//First time registration through android
                    $contnt = $a_explode[1];
                    $rcvd = base64_decode($contnt);
                    $andrd_APP = explode("*", $rcvd);

                    $f_name = $andrd_APP[0];
                    $l_name = $andrd_APP[1];
                    $u_name = $andrd_APP[2];
                    $password = $andrd_APP[3];
                    $secqn = $andrd_APP[4];
                    $secans = $andrd_APP[5];

                    $this->IsFacilityUser($mno);

                    $this->android_signup($f_name, $l_name, $u_name, $password, $secqn, $secans, $mno);
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "UPDT") {
//First time registration through android
                    $contnt = $a_explode[1];
                    $rcvd = base64_decode($contnt);
                    $andrd_APP = explode("*", $rcvd);

                    $mflno = $andrd_APP[0];

                    $this->UPDATEmfl($mflno, $mno);
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "SU") {
//Sign up update registration through android
                    $hcw_p_level = $this->getLevel($mno, $level);
                    foreach ($hcw_p_level as $m) {
                        $p_level = $m->level;
                        $hcw_id = $m->id;
                        if ($p_level <= 3) {
                            $contnt = $a_explode[1];
                            $rcvd = base64_decode($contnt);
                            $andrd_APP = explode("*", $rcvd);

                            $f_name = $andrd_APP[0];
                            $l_name = $andrd_APP[1];
                            $u_name = $andrd_APP[2];
                            $password = $andrd_APP[3];
                            $secqn = $andrd_APP[4];
                            $secans = $andrd_APP[5];

                            $this->IsFacilityUser($mno);


                            $this->android_signup_update($f_name, $l_name, $u_name, $password, $secqn, $secans, $mno);
                        }
                    }
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "REG") {
                    $hcw_p_level = $this->getLevel($mno, $level);
                    foreach ($hcw_p_level as $m) {
                        $p_level = $m->level;
                        $hcw_id = $m->id;
                        if ($p_level <= 5) {
                            //  echo "Health care worker level " . $p_level . "</br>";
//Didn't complete registration earlier so this statement completes the registration from android app.
                            //$andrd_APP = explode("*", $text);
                            $contnt = $a_explode[1];
                            $rcvd = base64_decode($contnt);
                            $andrd_APP = explode("*", $rcvd);

                            //$Partners = "";
                            $nnational_id = $andrd_APP[0];
                            if ($nnational_id == -1) {
                                $national_id = "";
                            } else {
                                $national_id = $andrd_APP[0];
                            }
                            $ddob = $andrd_APP[1];
                            if ($ddob == -1) {
                                $age = "";
                            } else {
                                $age = $andrd_APP[1];
                            }
                            $ggender = $andrd_APP[2];
                            if ($ggender == -1) {
                                $gender = "";
                            } else {
                                $gender = $andrd_APP[2];
                            }
                            $ccadre = $andrd_APP[3];
//                            if ($ccadre == -1) {
//                                $cadre = "";
//                            } else 
                            if (is_string($ccadre)) {
                                $cadreOTher = $andrd_APP[3];
                                $cadre = 9;
                                //echo "Cadre=> .$cadreOTher ";
                                // exit;
                            } else {
                                $cadre = $andrd_APP[3];
                            }
                            $ffacility_id = $andrd_APP[4];
                            if ($ffacility_id == -1) {
                                $facility_id = "";
                            } else {
                                $facility_id = $andrd_APP[4];
                            }
                            $dDuNo = $andrd_APP[5];
                            if ($dDuNo == -1) {
                                $DuNo = "";
                            } else {
                                $DuNo = $andrd_APP[5];
                            }
                            $sSpecs = $andrd_APP[6];
                            if ($sSpecs == -1) {
                                $Specs = "";
                            } else {
                                $Specs = $andrd_APP[6];
                            }
//                            $nnational_id = $andrd_APP[7];
//                            if ($nnational_id == -1) {
//                                $national_id = "";
//                            } else {
//                                $id = $andrd_APP[7];
//                            }
                            $prtner = $andrd_APP[7];
                            //Save partners' clients  in a pivot table 
//                            $contnt = "1+2+7+4+8+6";
                            $array = explode("+", $prtner);
                            foreach ($array as $key => $value) {

                                switch ($value) {
                                    case 1:
                                        $partner = 1;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 2:
                                        $partner = 2;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 3:
                                        $partner = 3;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 4:
                                        $partner = 4;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 5:
                                        $partner = 5;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 6:
                                        $partner = 6;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 7:
                                        $partner = 7;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 8:
                                        $partner = 8;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    case 9:
                                        $partner = 9;
                                        $this->SavePtnrID($hcw_id, $partner);
                                        break;
                                    default:
                                        break;
                                }
                            }
                            $this->android_register_update($gender, $cadre, $cadreOTher, $DuNo, $Specs, $national_id, $facility_id, $age, $mno);
                        } else {
//Send -Hello  your data has been updated successfully.
                            $msg_id = 60;
                            $this->confirmatory_message_outbox($mno, $msg_id);
                        }
                    }
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "IMMUNE") {
//Sign up update registration through android
                    $hcw_p_level = $this->getLevel($mno, $level);

                    foreach ($hcw_p_level as $m) {
                        $p_level = $m->level;
                        $hcw_id = $m->id;

                        $rcvd = base64_decode($contnt);
                        $andrd_APP = explode("*", $m_text);

                        $AddImn = array('client_id' =>
                            $hcw_id, 'hbv' => $andrd_APP[1], 'hbv' => $andrd_APP[2], 'hbvdose1'
                            => $andrd_APP[3], 'hbvdose2' => $andrd_APP[4], 'influenza' =>
                            $andrd_APP[5], 'influenzadose' => $andrd_APP[6], 'varcella' =>
                            $andrd_APP[7], 'historyofdisease' => $andrd_APP[8], 'varcelladose1'
                            => $andrd_APP[9], 'varcelladose2' => $andrd_APP[10], 'tdap' =>
                            $andrd_APP[11], 'booster' => $andrd_APP[12], 'tdapdose' =>
                            $andrd_APP[13], 'boosterdose' => $andrd_APP[14], 'measles' =>
                            $andrd_APP[15], 'measlesdose1' => $andrd_APP[16], 'measlesdose2' =>
                            $andrd_APP[17], 'meningoc' => $andrd_APP[18], 'meningocdose1' =>
                            $andrd_APP[19], 'meningocdose2' => $andrd_APP[20]);

                        $this->SaveCalndr($AddImn);
                    }
                }

                //kmpdu registration-check if mobile number exists on tbl_patientdetails.
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "UCSF") {
                    $hcw_p_level = $this->getLevel($mno, $level);
                    foreach ($hcw_p_level as $m) {
                        $p_level = $m->level;
                        $hcw_id = $m->id;
                        $fname = $m->f_name;
                        $lname = $m->l_name;
                        //echo "Health care worker level " . $fname . "</br>"."$lname";
//Didn't complete registration earlier so this statement completes the registration from android app
                        if ($p_level >= 5) {
                            $this->android_UCSF_register($mno, $fname, $lname);
                            ///$msg_id = 118;
                            //$this->insert_to_outbox($mno, $msg_id);
//                            $andrd_APP = explode("*", $text);
//
//                            $du_no = $andrd_APP[1];
//                            $dob = $andrd_APP[2];
//                            $gender = $andrd_APP[3];
//                            $cadre = $andrd_APP[4];
//                            $hepatitis_b = $andrd_APP[5];
//                            $u_name = $andrd_APP[6];
//                            $password = $andrd_APP[7];
//                            $confm_password = $andrd_APP[8];
//                            $sec_quiz = $andrd_APP[9];
//                            //KMPDU PARTNER ID
//                            $prtnerID = 5;
//
//                            $a_explode = explode("/", $dob);
//                            $yob = $a_explode[2];
//                            echo 'Fname ->' . $f_name . ' lname ' . $l_name . ' id ' . $national_id . ' dob ' . $dob . ' gender ' . $gender . ' cadre ' . $cadre . ' mfl ' .
//                            $facility_id . ' prtner ' . $Partners . ' hbv ' . $hepatitis_b . ' uname ' . $u_name . ' pwd ' . $password .
//                                    ' cpwd ' . $confm_password . ' sec ' . $sec_quiz;
                            //$this->android_KMPDU_register_update($mno, $du_no, $prtnerID, $cadre, $gender, $yob, $hepatitis_b, $u_name, $password, $confm_password, $sec_quiz);
                            // exit();
//
//                            if (is_string($f_name) && is_string($u_name) && ctype_alnum($password) && ctype_alnum($l_name) && ctype_digit($national_id) && (ctype_digit($gender) && strlen($gender) == '1') && (ctype_digit($cadre) && strlen($cadre) == '1') && (ctype_digit($facility_id) && strlen($facility_id) == '5')) {
                            // $this->android_register_update($Partners, $mno, $cadre, $national_id, $l_name, $f_name, $gender, $yob, $facility_id, $hepatitis_b, $u_name, $password, $confm_password, $sec_quiz);
//                                //echo "Registration through android app was successfull" . "</br>";
//                            }
                        }
//                        else {
////Send -Hello  your data has been updated successfully.
//                            $msg_id = 60;
//                            $this->confirmatory_message_outbox($mno, $msg_id);
//                        }
                    }
                }
                //kmpdu registration.
                if ($this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android == "KMPDU") {

//First time registration through android

                    $andrd_APP = explode("*", $text);

                    //$Partners = "";
                    // $f_name = $andrd_APP[1];
                    //$l_name = $andrd_APP[2];
                    //$national_id = $andrd_APP[3];
                    // $cadre = $andrd_APP[6];
                    // $facility_id = $andrd_APP[7];

                    $du_no = $andrd_APP[1];
                    $dob = $andrd_APP[2];
                    $gender = $andrd_APP[3];
                    $cadre = $andrd_APP[4];
                    $hepatitis_b = $andrd_APP[5];
                    $u_name = $andrd_APP[6];
                    $password = $andrd_APP[7];
                    $confm_password = $andrd_APP[8];
                    $sec_quiz = $andrd_APP[9];
                    //KMPDU PARTNER ID
                    $prtnerID = 5;

//                    $prtnersA = $andrd_APP[13];
//                    $prtnersB = $andrd_APP[14];
//                    $prtnerC = $andrd_APP[13];
//                    $Partners = $prtnersA . '+' . $prtnersB . '+' . $prtnerC;

                    $a_explode = explode("/", $dob);
                    $yob = $a_explode[2];


                    $this->android_kmpdu_register($mno, $du_no, $prtnerID, $du_no, $cadre, $gender, $yob, $hepatitis_b, $u_name, $password, $sec_quiz);

//                    if (is_string($f_name) && is_string($u_name) && ctype_alnum($password) && is_string($l_name) && ctype_digit($national_id) && (ctype_digit($gender) && strlen($gender) == '1') && (ctype_digit($cadre) && strlen($cadre) == '1') && (ctype_digit($facility_id) && strlen($facility_id) == '5')) {
//                        //$this->android_register($Partners, $mno, $cadre, $national_id, $l_name, $f_name, $gender, $yob, $facility_id, $hepatitis_b, $u_name, $password);
//                        // echo "Registration through android app was successfull" . "</br>";
//                    } else {
//                        // echo 'Invalid data  ' . $mno . '</br>';
//                    }
                }
                //Process keyword c4c once received on tbl_logs_inbox.
                if ($this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android == "C4C") {
                    $msg_id = 115;
                    $this->insert_outbox($mno, $msg_id);
//process keyword pep sends kindly  send your name
                    // $this->insert_outbox_not_registered($mno, $new_level);
                    // $this->insert_patientdetails_insert_number($mno, $new_level);
                    //echo 'Inserted mobile number to patientdetails and tbl_logs_outbox ; send- welcome to c4c send your name and id ,text=sent';
                }
                if ($this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android != "REG" && $reg_rep_android != "REP" && $reg_rep_android != "C4C" && $reg_rep_android != "APP") {
//Send pep to start registration -sent when one sends a non pep keyword                    
                    $msg_id = 68;
                    //$this->insert_to_outbox($mno, $msg_id);
                    //echo 'Inserted to  tbl_logs_outbox- text; Send pep to start reg';
                }
                if ($this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android == "REP") {
//Send pep to start registration -sent when one sends a non pep keyword
                    $msg_id = 68;
                    //$this->insert_to_outbox($mno, $msg_id);
                    // echo 'Inserted to  tbl_logs_outbox- text; Send Hello  you have been unsubscribed from c4c.';
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "STOP") {
//Send pep to start registration -sent when one sends a non pep keyword
                    $msg_id = 114;
                    $SmStatus = 2;
                    $this->ClientStatus($mno, $SmStatus);
                    $this->insert_to_outbox($mno, $msg_id);
                    // echo 'Inserted to  tbl_logs_outbox- text; Send pep to start registration';
                }
                if ($this->check_if_mobile_exists($mno) == "exists" || $this->check_if_mobile_exists($mno) == "empty" && $reg_rep_android == "C4C") {
                    $hcw_p_level = $this->getLevel($mno, $level);
                    // $msg_id = 115;
                    // $this->insert_outbox($mno, $msg_id);
                    // foreach ($hcw_p_level as $m) {
                    //     $p_level = $m->level;
                    //     $hcw_id = $m->id;
                    //     // echo "Health care worker levl " . $p_level . "</br>";
                    // }
//                     if ($p_level == 1) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 2) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 3) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 4) {
//                         $this->confirmatory_message();
//                     }
//                     if ($p_level == 5) {
//                         $this->confirmatory_message();
//                     }
//                     if ($p_level == 6) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 7) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 8) {
//                         $msg_id = $p_level;
//                         $this->insert_outbox($mno, $msg_id);
//                     }
//                     if ($p_level == 9) {
//                         $msg_id = $p_level - 3;
//                         $new_level = $msg_id;
//                         $this->insert_outbox($mno, $msg_id);
// //update tbl_patientdetails to level 6 for  a re-exposure report.
//                         $this->update_level_patientdetails($mno, $new_level);
//                     }
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android != "REG" && $reg_rep_android != "SU" && $reg_rep_android != "REP" && $reg_rep_android != "C4C" && $reg_rep_android != "YES" && $reg_rep_android != "NO" && $reg_rep_android != "BM" && $reg_rep_android != "CHK" && $reg_rep_android != "KMPDU" && $reg_rep_android != "APP" && $reg_rep_android != "UCSF" && $reg_rep_android != "UPDT" && $reg_rep_android != "STOP") {
                    $h_level = $this->getLevel($mno, $level);
                    foreach ($h_level as $value) {
                        $hcw_p_id = $value->id;
                        $mno = $x->mobile_no;
                        $hcw_r_level = $value->level;

                        if ($hcw_r_level == 9) {
                            $msg_id = 87;
//                            $this->insert_to_outbox($mno, $msg_id);
                        } else {
//                            $this->insert_or_update_tblpatientdetails($new_level, $text, $level, $mno);
                        }
                    }
                }
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "CHK") {
                    $current_time = date("Y-m-d H:i:s");
                    $msg = explode("*", $text);
                    $gps = $msg[1];

                    //Insert into checkin table 
                    $this->InsertCheckIn($mno, $current_time, $gps);
                    //Text the supervisor
                    // $msg_id = 115;
                    // $this->insert_to_outbox($mno, $msg_id);
                }
                //Before accepting an exposure report, check if one is fully registered.
                if ($this->check_if_mobile_exists($mno) == "exists" && $reg_rep_android == "REP") {
                    $h_level = $this->getLevel($mno, $level);
                    foreach ($h_level as $value) {
                        $hcw_p_id = $value->id;
                        $mno = $x->mobile_no;
                        $hcw_r_level = $value->level;

                        $contnt = $a_explode[1];

                        $rcvd = base64_decode($contnt);
                        $andrd_APP = explode("*", $rcvd);
//                        print_r($andrd_APP);                        



                        $elocation = $andrd_APP[0];

                        if (is_string($elocation)) {
                            $Othrlocation = $elocation;
                        }
                        $location = 9;

                        $cause = $andrd_APP[1];
                        $purpose = $andrd_APP[2];
                        $when = $andrd_APP[3];
                        $HivStatus = $andrd_APP[4];
                        $HbvStatus = $andrd_APP[5];
                        $numberofexposures = $andrd_APP[6];
                        $pepinit = $andrd_APP[7];
                        $dateofpep = $andrd_APP[8];
                        $device = $andrd_APP[9];
                        $deviceSafety = $andrd_APP[10];
                        $deep = $andrd_APP[11];
                        $pepinitdate = $andrd_APP[12];
                        $exposureresult = $andrd_APP[13];

                        $current_time = date("Y-m-d H:i:s");
                        $datetime = strtotime("now");

                        $rdate = str_replace('/', '-', $dateofpep);
                        $dateofexposure = date('Y-m-d H:i:s', strtotime($rdate));

                        $pepdate = str_replace('/', '-', $pepinitdate);
                        $dateofpepinit = date('Y-m-d H:i:s', strtotime($pepdate));

                        $report_date = strtotime($rdate);
                        $no_after = $datetime - $report_date;
                        $ddays = $no_after / 86400;
                        $r_days = round($ddays);
                        $hours = round($no_after / ( 3600));






                        $rexpose = array(
                            'p_details_id' => $hcw_p_id,
                            'exposure_location' => $location,
                            'Other_location' => $Othrlocation,
                            'exposure_type' => $cause,
                            'Other_cause' => $Othercause,
                            'purpose' => $purpose,
                            'whenithapnd' => $when,
                            'HivStatus' => $HivStatus,
                            'numberofexposures' => $numberofexposures,
                            'pepinit' => $pepinit,
                            'dateofexposure' => $dateofexposure,
                            'device' => $device,
                            'deviceSafety' => $deviceSafety,
                            'deep' => $deep,
                            'dateofpepinit' => $dateofpepinit,
                            'date_exposed' => $current_time,
                            'exposureresult' => $exposureresult,
                            'created_at' => $current_time
                        );

                        // print_r($rexpose);  
                        // exit;     
                        // echo "HCW id on tbl_patientdetails = " . $hcw_p_id . "</br>";
//Checks if one is fully registered on tbl_patientdetails else if not send a text to request one to complete registration
//                        if ($hcw_r_level >= 5) {


                        if ($this->check_if_exposed_earlier($hcw_p_id) == "Yes") {



                            $current_time = date("Y-m-d H:i:s");
                            $re_ex_count = $count + 1;
//Report a re- exposure through android app or incomplete exposure reported through sms
                            // $this->android_exposure_report($rexpose);
                            $this->db->insert('tbl_reports_all', $rexpose);

                            $this->db->where('p_details_id', $hcw_p_id);
                            $this->db->update('tbl_reports', $rexpose);

                            $this->db->set('level', 9);
                            $this->db->where('mobile_no', $mno);
                            $this->db->update('tbl_patientdetails');
                        }
                        if ($this->check_if_exposed_earlier($hcw_p_id) == "No") {

                            // $this->android_exposure_report( $rexpose);
//                                    $this->db->insert('tbl_reports_all', $rexpose);

                            $this->db->insert('tbl_reports', $rexpose);

                            $this->db->where('p_details_id', $hcw_p_id);
                            $this->db->update('tbl_reports', $rexpose);

                            $this->db->set('level', 9);
                            $this->db->where('mobile_no', $mno);
                            $this->db->update('tbl_patientdetails');
                        }


                        if ($hours >= 72) {
                            $text = 71;
                            $this->android_complete_report($mno, $text);
                            // echo "Mobi ".$mno.' MSG 71 > = '.$text.'</br>';
                        } else if ($hours < 72) {
                            $text = 9;
                            $this->android_complete_report($mno, $text);
                            // echo "Mobi ".$mno.' MSG < 72 = '.$text.'</br>';
                        } if ($this->check_if_exposed_earlier($hcw_p_id) == "Yes") {
                            $text = 89;
                            $this->android_complete_report($mno, $text);
                            // echo "Mobi ".$mno.' MSGs > 1= '.$text.'</br>';
//            $text = 90;
//            $this->android_complete_report($mno, $text);
                        }

//                        }
                    }
                }
                //update tbl_logs_inbox sms_status to 2 to stop loops
                $this->update_inbox($new_level, $mno);
            }
        }
    }

    function SaveCalndr($AddImn) {

        $insert = $this->db->insert('tbl_calendar', $AddImn);
        // if ($insert) {
        //     echo "Success";
        // }
    }

    function report_exposure_type($mno, $msg_id, $id, $e_type, $no_of_hours) {
        $this->insert_outbox($mno, $msg_id);
        $date = date("Y-m-d H:i:s");
        $query = $this->db->query("INSERT INTO tbl_reports(p_details_id,exposure_hours,exposure_type,date_exposed) VALUES ('$id','$no_of_hours','$e_type','$date')");
        $query = $this->db->query("update tbl_patientdetails SET level='$msg_id' where mobile_no='$mno'");
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function update_exposure_type($re_ex_count, $mno, $msg_id, $id, $e_type, $no_of_hours) {
        $this->insert_outbox($mno, $msg_id);
        $date = date("Y-m-d H:i:s");
        $query = $this->db->query("update tbl_reports set re_exposure_count='$re_ex_count', exposure_hours='$no_of_hours',exposure_type='$e_type',date_exposed='$date' where p_details_id='$id'");
        $query = $this->db->query("update tbl_patientdetails SET level='$msg_id' where mobile_no='$mno'");
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function report_location($report, $mno, $msg_id, $id, $e_location, $hc_level) {

        $date = date("Y-m-d H:i:s");
        $query = $this->db->query("update  tbl_reports set date_exposed='$date', exposure_location='$e_location' where p_details_id='$id'");
        $query = $this->db->query("update tbl_patientdetails SET level='$msg_id' where mobile_no='$mno'");
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
        //re-exposure insertion
        $this->report_all_re_exposure($id);

        $query_chk = $this->db->query("SELECT re_exposure_count,exposure_hours FROM tbl_reports where p_details_id='$id'");
        if ($query_chk->num_rows() > 0) {
            $check = $query_chk->result();
            $re_ex_count = "";
            $ex_hours = "";
            foreach ($check as $x) {
                $re_ex_count = $x->re_exposure_count;
                $ex_hours = $x->exposure_hours;
                if ($re_ex_count >= 1) {
                    $this->re_exposureMsg0ne($mno, $msg_id);
                } else {
                    $this->insert_outbox($mno, $msg_id);
                }
                if ($ex_hours >= 72) {
                    $msg_id = 71;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
        }
    }

    function above_72hours($mno, $msg_id) {
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->sender();
    }

    function android_complete_report($mno, $text) {
// $complete_report = 8;
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$text','$mno')");

        $this->sender();
    }

//First Time report
    function android_report_new($hcw_p_id, $hours, $mno, $current_time, $location, $cause, $purpose, $when, $HivStatus, $HbvStatus, $numberofexposures, $pepinit, $dateofexposure, $device, $deviceSafety, $deep, $dateofpepinit, $exposureresult) {
        $r_text = 9;
        //$query = $this->db->query("INSERT INTO tbl_reports  (exposure_location,exposure_type,exposure_hours,p_details_id,date_exposed) VALUES ('$location','$cause','$hours','$hcw_p_id','$current_time')");
        $rexpose = array(
            'p_details_id' => $hcw_p_id,
            'exposure_location' => $location,
            'cause' => $cause,
            'purpose' => $purpose,
            'whenithapnd' => $when,
            'HivStatus' => $HivStatus,
            'numberofexposures' => $numberofexposures,
            'pepinit' => $pepinit,
            'dateofexposure' => $dateofexposure,
            'device' => $device,
            'deviceSafety' => $deviceSafety,
            'deep' => $deep,
            'dateofpepinit' => $dateofpepinit,
            'exposure_hours' => $dateofpepinit,
            'date_exposed' => $current_time,
            'exposureresult' => $exposureresult,
            'created_by' => $current_time
        );

        $this->db->insert('tbl_reports', $rexpose);
        $query = $this->db->query("update tbl_patientdetails SET level='$r_text' where mobile_no='$mno'");
//$query_update = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->android_complete_report($mno, $r_text);
        $query = $this->db->query("update tbl_logs_inbox SET level='$r_text' where mobile_no='$mno'");

        if ($hours >= 72) {
            $text = 71;
            $this->android_complete_report($mno, $text);
        } else if ($hours < 72) {
            $text = 9;
            $this->android_complete_report($mno, $text);
        }
    }

    function android_report($hcw_p_id, $hours, $mno, $current_time, $location, $cause, $purpose, $when, $HivStatus, $HbvStatus, $numberofexposures, $pepinit, $dateofexposure, $device, $deviceSafety, $deep, $dateofpepinit, $exposureresult) {
        $r_text = 9;
        //$query = $this->db->query("INSERT INTO tbl_reports  (exposure_location,exposure_type,exposure_hours,p_details_id,date_exposed) VALUES ('$location','$cause','$hours','$hcw_p_id','$current_time')");
        $rexpose = array(
            'p_details_id' => $hcw_p_id,
            'exposure_location' => $location,
            'exposure_type' => $cause,
            'purpose' => $purpose,
            'whenithapnd' => $when,
            'HivStatus' => $HivStatus,
            'numberofexposures' => $numberofexposures,
            'pepinit' => $pepinit,
            'dateofexposure' => $dateofexposure,
            'device' => $device,
            'deviceSafety' => $deviceSafety,
            'deep' => $deep,
            'dateofpepinit' => $dateofpepinit,
            'date_exposed' => $current_time,
            'exposureresult' => $exposureresult,
            'created_at' => $current_time
        );

        $this->db->insert('tbl_reports', $rexpose);

        $query = $this->db->query("update tbl_patientdetails SET level='$r_text' where mobile_no='$mno'");
//$query_update = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->android_complete_report($mno, $r_text);
        $query = $this->db->query("update tbl_logs_inbox SET level='$r_text' where mobile_no='$mno'");

        if ($hours >= 72) {
            $text = 71;
            $this->android_complete_report($mno, $text);
        } else if ($hours < 72) {
            $text = 9;
            $this->android_complete_report($mno, $text);
        }
    }

    //Re-exposure report
//    function android_reexposure($hcw_p_id, $mno, $location, $cause, $hours, $re_ex_count, $count, $current_time) {
    function android_reexposure($hcw_p_id, $hours, $count, $re_ex_count, $mno, $current_time, $location, $Othrlocation, $cause, $purpose, $when, $HivStatus, $HbvStatus, $numberofexposures, $pepinit, $dateofexposure, $device, $deviceSafety, $deep, $dateofpepinit, $exposureresult) {
        $r_text = 9;







        if (is_string($cause)) {
            $Othercause = $cause;
            $cause = 9;

            $rexpose = array(
                'p_details_id' => $hcw_p_id,
                'exposure_location' => $location,
                'Other_location' => $Othrlocation,
                'exposure_type' => $cause,
                'Other_cause' => $Othercause,
                'purpose' => $purpose,
                'whenithapnd' => $when,
                'HivStatus' => $HivStatus,
                'numberofexposures' => $numberofexposures,
                'pepinit' => $pepinit,
                'dateofexposure' => $dateofexposure,
                'device' => $device,
                'deviceSafety' => $deviceSafety,
                'deep' => $deep,
                'dateofpepinit' => $dateofpepinit,
                'date_exposed' => $current_time,
                'exposureresult' => $exposureresult,
                'created_at' => $current_time
            );
            $this->db->where('p_details_id', $hcw_p_id);
            $this->db->update('tbl_reports', $rexpose);
        } else {

            $rexpose = array(
                'p_details_id' => $hcw_p_id,
                'exposure_location' => $location,
                'Other_location' => $Othrlocation,
                'exposure_type' => $cause,
                'purpose' => $cause,
                'whenithapnd' => $when,
                'HivStatus' => $HivStatus,
                'numberofexposures' => $numberofexposures,
                'pepinit' => $pepinit,
                'dateofexposure' => $dateofexposure,
                'device' => $device,
                'deviceSafety' => $deviceSafety,
                'deep' => $deep,
                'dateofpepinit' => $dateofpepinit,
                'date_exposed' => $current_time,
                'exposureresult' => $exposureresult,
                'created_at' => $current_time
            );
//        $this->db->insert('tbl_reports', $rexpose);
            $this->db->where('p_details_id', $hcw_p_id);
            $this->db->update('tbl_reports', $rexpose);
        }
//        $query = $this->db->query("update tbl_reports set exposure_location='$location',exposure_type='$cause',"
//                . "exposure_hours='$hours' ,re_exposure_count='$re_ex_count',date_exposed='$current_time' where p_details_id='$hcw_p_id'");

        $query = $this->db->query("update tbl_logs_inbox SET level='$r_text' where mobile_no='$mno'");
        $query = $this->db->query("update tbl_patientdetails SET level='$r_text' where mobile_no='$mno'");
        if ($hours >= 72) {
            $text = 71;
            $this->android_complete_report($mno, $text);
        }
        if ($count >= 1) {
            $text = 89;
            $this->android_complete_report($mno, $text);
//            $text = 90;
//            $this->android_complete_report($mno, $text);
        }
    }

    function android_exposure_report($hcw_p_id, $hours, $current_time, $location, $Othrlocation, $cause, $purpose, $when, $HivStatus, $HbvStatus, $numberofexposures, $pepinit, $dateofexposure, $device, $deviceSafety, $deep, $dateofpepinit, $exposureresult) {

        //$query = $this->db->query("INSERT INTO tbl_reports_all  (exposure_location,exposure_type,exposure_hours,p_details_id,date_exposed) VALUES ('$location','$cause','$hours','$hcw_p_id','$current_time')");
        if (is_string($cause)) {
            $Othercause = $cause;
            $cause = 9;

            $rexpose = array(
                'p_details_id' => $hcw_p_id,
                'exposure_location' => $location,
                'Other_location' => $Othrlocation,
                'exposure_type' => $cause,
                'Other_cause' => $Othercause,
                'purpose' => $purpose,
                'whenithapnd' => $when,
                'HivStatus' => $HivStatus,
                'numberofexposures' => $numberofexposures,
                'pepinit' => $pepinit,
                'dateofexposure' => $dateofexposure,
                'device' => $device,
                'deviceSafety' => $deviceSafety,
                'deep' => $deep,
                'dateofpepinit' => $dateofpepinit,
                'date_exposed' => $current_time,
                'exposureresult' => $exposureresult,
                'created_at' => $current_time
            );
            $this->db->insert('tbl_reports_all', $rexpose);
        } else {

            $rexpose = array(
                'p_details_id' => $hcw_p_id,
                'exposure_location' => $location,
                'Other_location' => $Othrlocation,
                'exposure_type' => $cause,
                'purpose' => $cause,
                'whenithapnd' => $when,
                'HivStatus' => $HivStatus,
                'numberofexposures' => $numberofexposures,
                'pepinit' => $pepinit,
                'dateofexposure' => $dateofexposure,
                'device' => $device,
                'deviceSafety' => $deviceSafety,
                'deep' => $deep,
                'dateofpepinit' => $dateofpepinit,
                'date_exposed' => $current_time,
                'exposureresult' => $exposureresult,
                'created_at' => $current_time
            );
            $this->db->insert('tbl_reports_all', $rexpose);
        }
    }

    function check_if_exposed_earlier($hcw_p_id) {
        $querycheck = $this->db->query("SELECT id,p_details_id FROM tbl_reports where p_details_id='$hcw_p_id'");
        if ($querycheck->num_rows() > 0) {
            return "Yes";
        } elseif ($querycheck->num_rows() <= 0) {
            return "No";
        }
    }

    function ClientStatus($mno, $SmStatus) {
        $query = $this->db->query("update  tbl_patientdetails set sms_enabled='$SmStatus' where mobile_no='$mno'");
    }

    function SavePtnrID($hcw_id, $partner) {

        $AddPat = array(
            'hcwID' => $hcw_id,
            'PatName' => $partner
        );
        $this->db->insert('tbl_PartnerClients', $AddPat);
    }

    function UpdtPtnrID($hcw_id, $partner) {
        $UpdtPat = array(
            'hcwID' => $hcw_id,
            'PatName' => $partner
        );
        $this->db->where('hcwID', $hcw_id);
        $this->db->update('tbl_PartnerClients', $UpdtPat);
    }

    function android_signup($f_name, $l_name, $u_name, $password, $secqn, $secans, $mno) {
        $default_level = 4;
        $su_items = array(
            'f_name' => $f_name,
            'l_name' => $l_name,
            'username' => $u_name,
            'password' => $password,
            'sec_quiz' => $secqn,
            'secans' => $secans,
            'level' => $default_level,
            'mobile_no' => $mno
        );
        $this->db->insert('tbl_patientdetails', $su_items);

        //$this->android_confirmatory_message_outbox($mno);
//update inbox level.
        $msg_id = 5;
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
        $items = array(
            'message_id' => $msg_id,
            'mobile_no' => $mno
        );
        $this->db->insert('tbl_logs_outbox', $items);
        $this->sender();
    }

    function UPDATEmfl($mflno, $mno) {
        $data = array(
            'facility_id' => $mflno
        );
        $this->db->where('mobile_no', $mno);
        $this->db->update('tbl_patientdetails', $data);
    }

    function android_signup_update($f_name, $l_name, $u_name, $password, $secqn, $secans, $mno) {
        $default_level = 4;
//        $query = $this->db->query("insert into tbl_patientdetails (f_name,l_name,username,password,sec_quiz,secans,mobile_no,level)
//            VALUES ('$f_name','$l_name','$u_name','$password','$secqn','$secans','$mno','$default_level')");

        $data = array(
            'f_name' => $f_name,
            'l_name' => $l_name,
            'username' => $u_name,
            'password' => $password,
            'sec_quiz' => $secqn,
            'secans' => $secans,
            'level' => $default_level,
            'mobile_no' => $mno
        );
        $this->db->where('mobile_no', $mno);
        $this->db->update('tbl_patientdetails', $data);
        //$this->android_confirmatory_message_outbox($mno);
//update inbox level.
        $msg_id = 5;
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function android_register_update($gender, $cadre, $cadreOTher, $DuNo, $Specs, $national_id, $facility_id, $age, $mno) {
//    android_register_update($id, $age, $gender, $cadre, $facility_id, $hepatitis_b, $firtdose, $secdose, $DuNo, $Specs, $Partner, $mno) {
        //echo $age . ' Phone ' . $mno;
        //exit;         
        $default_level = 5;

        if (is_string($facility_id)) {

            $getMFL = $this->db->get_where('tbl_master_facility', array('name' => $facility_id));

            if ($getMFL->num_rows() > 0) {
                foreach ($getMFL->result() as $value) {
                    $mflID = $value->code;

                    $Register = array(
                        'gender_id' => $gender,
                        'cadre_id' => $cadre,
                        'cadreOTher' => $cadreOTher,
                        'du_no' => $DuNo,
                        'specs' => $Specs,
                        'facility_id' => $mflID,
                        'national_id' => $national_id,
                        'DOB' => $age,
//            'partner_id' => $Partner,
                        'level' => $default_level
                    );

                    $this->db->where('mobile_no', $mno);
                    $this->db->update('tbl_patientdetails', $Register);
                }
            }
        } else {

            $Register = array(
                'gender_id' => $gender,
                'cadre_id' => $cadre,
                'cadreOTher' => $cadreOTher,
                'du_no' => $DuNo,
                'specs' => $Specs,
                'facility_id' => $facility_id,
                'national_id' => $national_id,
                'DOB' => $age,
//            'partner_id' => $Partner,
                'level' => $default_level
            );

            $this->db->where('mobile_no', $mno);
            $this->db->update('tbl_patientdetails', $Register);
        }

        $this->android_confirmatory_message_outbox($mno);
//update inbox level.

        $msg_id = 4;
        $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function android_register($gender, $cadre, $DuNo, $Specs, $national_id, $facility_id, $age, $Partner, $mno) {
//    android_register_update($id, $age, $gender, $cadre, $facility_id, $hepatitis_b, $firtdose, $secdose, $DuNo, $Specs, $Partner, $mno) {
        //echo $age . ' Phone ' . $mno;
        //exit;         
        $default_level = 5;

        $Register = array(
            'gender_id' => $gender,
            'cadre_id' => $cadre,
            'du_no' => $DuNo,
            'specs' => $Specs,
            'facility_id' => $facility_id,
            'national_id' => $national_id,
            'DOB' => $age,
            'partner_id' => $Partner,
            'level' => $default_level
        );

        $this->db->where('mobile_no', $mno);
        $this->db->update('tbl_patientdetails', $Register);

        $this->android_confirmatory_message_outbox($mno);
//update inbox level.

        $msg_id = 4;
        $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function android_kmpdu_register($mno, $prtnerID, $du_no, $cadre, $gender, $yob, $hepatitis_b, $u_name, $password, $sec_quiz) {
        $default_level = 5;
        $query = $this->db->query("insert into  tbl_patientdetails (DOB,partner_id,du_no,gender_id,cadre_id,username,password,level,mobile_no,hepatitis_b)
            VALUES ('$yob','$prtnerID','$du_no','$gender','$cadre','$u_name','$password','$default_level','$mno','$hepatitis_b')");

        $this->android_confirmatory_message_outbox($mno);
//update inbox level
        $msg_id = 5;
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

//    function android_UCSF_register($mno, $du_no, $prtnerID, $cadre, $gender, $yob, $hepatitis_b, $u_name, $password, $confm_password, $sec_quiz) {
//        $default_level = 5;
//        $query = $this->db->query("update  tbl_patientdetails set du_no='$du_no',sec_quiz='$sec_quiz',confirm_password='$confm_password',partner_id='$prtnerID',
//                cadre_id='$cadre',gender_id='$gender',level='$default_level',hepatitis_b='$hepatitis_b',username='$u_name',password='$password' where mobile_no='$mno'");
//
//        $this->android_confirmatory_message_outbox($mno);
////update inbox level.
//        $msg_id = 4;
//        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
//    }
    function android_UCSF_register($mno, $fname, $lname) {
        // $this->db->trans_start();
        $date_added = date("Y-m-d H:i:s");
        $query = $this->db->query("insert into  tbl_ucsf (f_name,l_name,mobile_no,date_subscribed)
            VALUES ('$fname','$lname','$mno','$date_added')");
//        $fname = $this->input->post('fname');
//        $phone_no = $this->input->post('phone_no');
//        $lname = $this->input->post('lname');        
//        $cadre_id = $this->input->post('cadre_id');
//        $gender = $this->input->post('gender_id');
//        $dob = $this->input->post('dob');
//        $facility_id = $this->input->post('facility_id');        
//        $registrationmode = 1;        
//        $partner = 2;
        //$password = $this->cryptPass($phone_no);
//         $data_insert = array(
//             'f_name' => $fname,
//             'l_name' => $lname,
//             'mobile_no' => $mno,
//             'date_subscribed' => $date_added
// //            'cadre_id' => $cadre_id,
// //            'gender_id' => $gender,
// //            'DOB' => $dob,
// //            'facility_id' => $facility_id,
// //            'registrationmode' => $registrationmode,
// //            'partner_id' => $partner
//         );
//         $this->db->insert('tbl_ucsf', $data_insert);
//         $this->db->trans_complete();
//         if ($this->db->trans_status() === FALSE) {
//             return FALSE;
//         } else {
//             return TRUE;
//         }
    }

    function UpdateCheckIn($StudMfl, $reg_rep_android, $StudId, $CheckInTime) {
        //A switch to process Yes or No response from the supervisor.
        switch ($reg_rep_android) {
            case "YES":
                $CheckinStatus = 1;
                break;
            case "NO":
                $CheckinStatus = 2;
                break;
        }
        // echo 'This=> ' . $CheckInTime . " ID " . $StudId;
//        exit();
        $query = $this->db->query("update tbl_checkin set CheckInStatus='$CheckinStatus' where  checkin_time ='$CheckInTime'");
    }

    function InsertCheckIn($mno, $current_time, $gps) {
        $level = "";
        $StudMfl = $this->getLevel($mno, $level);
        foreach ($StudMfl as $m) {
            $StudentMfl = $m->facility_id;
        }
        // echo 'This ' . $gps . ' ' . $mno.' '.$StudentMfl;
//        exit();
        $query = $this->db->query("INSERT INTO tbl_checkin (mobile_no,checkin_time,facility_id)VALUES ('$mno','$current_time','$StudentMfl')");
    }

    function getStudent($SupMfl) {
        $stud = $this->db->query("SELECT id,mobile_no,checkin_time,facility_id FROM tbl_checkin where facility_id='$SupMfl'");
        if ($stud->num_rows() > 0) {
            $StudentMfl = $stud->result();
            return $StudentMfl;
        } else {
            return "Student was not found";
        }
    }

    function CheckFacility($mno) {
        $check = $this->db->query("SELECT user_level,user_mobile,facility FROM tbl_staffdetails where user_mobile like '$mno'");
        if ($check->num_rows() > 0) {
            return "exists";
        } else {
            return "empty";
        }
    }

    function getSuperVisor($mno) {
        $querySvisor = $this->db->query("SELECT user_level,user_mobile,facility FROM tbl_staffdetails where user_mobile = '$mno' AND  user_level=7");
        if ($querySvisor->num_rows() > 0) {
            $sVisor = $querySvisor->result();
            return $sVisor;
        } else if ($querySvisor->num_rows() <= 0) {
            return "OOPs Supervisor was not found";
//echo 'nothing found';
        }
    }

    function getLevel($mno, $level) {
        $queryone = $this->db->query("SELECT level,id,mobile_no,facility_id,f_name,l_name FROM tbl_patientdetails where mobile_no='$mno'");
        if ($queryone->num_rows() > 0) {
            $hcw_level = $queryone->result();
            return $hcw_level;
        } else if ($queryone->num_rows() <= 0) {
            return "HCW level was not found";
//echo 'nothing found';
        }
    }

    function TextSuperVisor() {
        $query_outbox = $this->db->query("SELECT user_mobile,facility FROM tbl_staffdetails WHERE user_level=7");
        if ($query_outbox->num_rows() > 0) {
            $minutes = $query_outbox->result();
            foreach ($minutes as $m) {
                $mno = $m->user_mobile;
                $mfl = $m->facility;

                $query_checkin = $this->db->query("SELECT facility_id,mobile_no,checkin_time FROM tbl_checkin");
                if ($query_checkin->num_rows() > 0) {
                    $chk = $query_checkin->result();
                    foreach ($chk as $m) {
                        $mnoo = $m->mobile_no;
                        $StudFacility = $m->facility_id;

                        $checkin = $m->checkin_time;
                        $date_sent = strtotime($checkin);
                        $datetime = strtotime("now");

                        $substract = $datetime - $date_sent;
                        $r_minutes = $substract / 60;
                        $minutes = round($r_minutes);

                        if ($mfl == $StudFacility) {
                            //echo 'This=>'." ".$minutes."  ".$mobile_no;
                            if ($minutes < 5) {
                                $this->notify_supervisor($mno);
                            }
                        }
                    }
                }
            }
        }
    }

    //text to notify supervisor at the facility
    function notify_supervisor($mno) {
        $msg_id = 114;
        $this->insert_outbox($mno, $msg_id);
    }

    //send broadcast messages every 14 days
    function automated_broadcast() {

        $querytwo = $this->db->query("SELECT id,messages FROM tbl_messages WHERE category_id='6'");
        if ($querytwo->num_rows() > 0) {
            $query_hjw = $querytwo->result();
            foreach ($query_hjw as $m) {
                $mid = $m->id;
                $query_p = $this->db->query("SELECT mobile_no FROM tbl_patientdetails WHERE sms_enabled = 1");
                if ($query_p->num_rows() > 0) {
                    $query_hww = $query_p->result();
                    foreach ($query_hww as $rep_hcw) {
                        $mno = $rep_hcw->mobile_no;
                        $query_outbox = $this->db->query("SELECT id,mobile_no,message_id,date_created FROM tbl_logs_outbox WHERE message_id='$mid' and mobile_no='$mno'");
                        if ($query_outbox->num_rows() > 0) {
                            $data = $query_outbox->result();
                            foreach ($data as $o_days) {
                                $text_id = $o_days->message_id;
                                $r_date = $o_days->date_created;

                                $current_time = date("Y-m-d H:i:s");
                                $datetime = strtotime("now");
                                $report_date = strtotime($r_date);
                                $no_after = $datetime - $report_date;
                                $ddays = $no_after / 86400;
                                $r_days = round($ddays);
                                $hours = $no_after / 3600;
                            }
                            if ($r_days == 14 && $text_id != 111) {
                                $msg_id = $text_id + 1;
                                // echo "Not on day 14 clients =  " . " " . $mno . " " . $msg_id . "</br>" . "</br>";
                                $this->insert_autobroadcast($mno, $msg_id);
                            }
                            if ($r_days == 14 && $text_id == 111) {
                                $msg_id = $text_id - 19;
                                // echo "Day 14 Clients =  " . " " . $mno . " " . $msg_id . "</br>" . "</br>";
                                $this->insert_autobroadcast($mno, $msg_id);
                            }
                            //Uncomment below statement to restart the process the function had failed prevously
                            // if ($mid == 93) {
                            //     $msg_id = 93;
                            //      echo "Exisitng  client =  " . $mno . " Sent Text " . $text_id . "</br>" . "</br>";
                            //      $this->insert_autobroadcast($mno, $msg_id);
                            //     exit();
                            // }
                        }
                        if ($query_outbox->num_rows() == 0) {
                            if ($mid == 93) {
                                $msg_id = 93;
                                //$mno='+254728802160';
                                // echo "New client =  " . $mno . " Text " . $msg_id . "</br>" . "</br>";
                                $this->insert_autobroadcast($mno, $msg_id);
                                //exit();
                            }
                        }
                    }
                }
            }
        }
    }

    function insert_autobroadcast($mno, $msg_id) {
        //echo "This =  " . " " . $mno . " " . $msg_id . "</br>" . "</br>";
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->sender();
    }

    function InsertTblBroadcastTable($county, $scounty, $facility, $bname, $cadre, $bText, $sendDate) {
        $query = $this->db->query("INSERT INTO tbl_sms_broadcast (county_id,sub_county_id,facility_id,cadre_id,msg,broadcastname)
                                                  VALUES ('$county','$scounty','$facility','$cadre','$bText','$bname')");
    }

    function check_if_mobile_exists($mno) {
        $querycheck = $this->db->query("SELECT mobile_no,id FROM tbl_patientdetails where mobile_no like '$mno'");
        if ($querycheck->num_rows() > 0) {
            return "exists";
        } elseif ($querycheck->num_rows() <= 0) {
            return "empty";
        }
    }

    function CheckUserLevel($mno) {
        $queryone = $this->db->query("SELECT * FROM tbl_staffdetails where user_mobile like '$mno'");
        if ($queryone->num_rows() > 0) {
            $UserLevel = $queryone->result();
            return $UserLevel;
        } else if ($queryone->num_rows() <= 0) {
            return "user level was not found";
//echo 'nothing found';
        }
    }

    function age_group() {

        $get_dob = $this->db->query("Select tbl_patientdetails.id, tbl_patientdetails.DOB from tbl_patientdetails inner join tbl_master_facility "
                        . "on tbl_master_facility.code = tbl_patientdetails.facility_id ")->result_array();

        foreach ($get_dob as $value) {
            $id = $value['id'];
            $crnt_date = (int) date('Y');
            $dob = $value['DOB'];
            $mydate = (int) $dob;

            if (($crnt_date - $mydate) >= 15 && ($crnt_date - $mydate) <= 19) {
                $x = 1;
            }
            if (($crnt_date - $mydate) >= 20 && ($crnt_date - $mydate) <= 24) {
                $x = 2;
            }
            if (($crnt_date - $mydate) >= 25 && ($crnt_date - $mydate) <= 29) {
                $x = 3;
            }
            if (($crnt_date - $mydate) >= 30 && ($crnt_date - $mydate) <= 34) {
                $x = 4;
            }
            if (($crnt_date - $mydate) >= 35 && ($crnt_date - $mydate) <= 39) {
                $x = 5;
            }
            if (($crnt_date - $mydate) >= 40 && ($crnt_date - $mydate) <= 44) {
                $x = 6;
            }
            if (($crnt_date - $mydate) >= 45 && ($crnt_date - $mydate) <= 49) {
                $x = 7;
            }
            if (($crnt_date - $mydate) >= 50 && ($crnt_date - $mydate) <= 54) {
                $x = 8;
            }
            if (($crnt_date - $mydate) > 54) {
                $x = 9;
            }

            $this->db->query("UPDATE tbl_patientdetails set age_group = $x where id = $id");
        }
    }

    function Bsms($bm) {

        // echo "Done";
        // print_r($bm);
        // $msg_id = $bm['msg'];
        // $insert = $this->db->insert('tbl_sms_broadcast', $bm);
        // if($insert){
        //     echo "Done";
        // }else{
        //     echo "Naah";
        // }
        $this->ebola($bm);
    }

//     function ebola($bm) {
//          // print_r($bm);
//         $query = $this->db->query(" SELECT  DISTINCT mobile_no,cadre FROM `tbl_sentandreceivedsms` WHERE cadre !='Cleaner'")->result_array();
// foreach ($query as $row)
// {
//          // $mno->mobile_no;
//          $mobile_no = $query['mobile_no'];
//          // $mno = array('mobile_no' => $mobile_no);
//          // $items = array_merge($mno, $bm);
//          print_r($mno);
//          // $insert = $this->db->insert('tbl_logs_broadcast', $items)
// }
//     }
    function ebola_sender() {
        $query_2 = $this->db->query("SELECT id,message_id,mobile_no FROM tbl_logs_broadcast where status='1'")->result();



        foreach ($query_2 as $value) {
            $Draft_msg = $value->message_id;
            $mobile_no = $value->mobile_no;
            $id = $value->id;

            $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
            foreach ($query_name as $nm) {
                $fname = $nm->f_name;
                // $sys_id = $nm->sys_id;
//substr_replace(string,replacement,start,length)

                $msg = str_replace("YYY", $fname, $Draft_msg);
//                        $Draft_msg = substr_replace($text, $sys_id, 7, 0);

                $msg = str_replace("XXX", $fname, $Draft_msg);

                print_r($msg);

                // exit();

                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }
                if ($dest <> '') {
                    //call sender api fn to send messages
                    $this->PostSMS($dest, $msg);

//update status to sent to stop loops
                    $status = '2';
                    $query_update = $this->db->query("UPDATE tbl_logs_broadcast SET status ='$status' where id='$id'");

                    echo $msg . '</br>';
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function broadcast() {
        $broad = $this->db->query("SELECT approval_status,id,date_created,county_id,sub_county_id,facility_id,msg,cadre_id,sms_status,sms_datetime FROM tbl_sms_broadcast WHERE sms_status='1'");
        if ($broad->num_rows() > 0) {
            $sms = $broad->result();
            foreach ($sms as $x) {
                $county_id = $x->county_id;
                $msg_id = $x->msg;
                $id = $x->id;
                $sub_county_id = $x->sub_county_id;
                $facility_id = $x->facility_id;
                $cadre_id = $x->cadre_id;
                $send_date = $x->date_created;
                $approval_status = $x->approval_status;

                $current_date = date("Y-m-d");
                $a_explode = explode(" ", $send_date);
                $today = $a_explode[0];
                $safu = [$cadre_id, $county_id, $sub_county_id, $facility_id];

//                print_r($safu);
//                print_r($safu[1]);
//                $this->b_data($cadre_id, $county_id, $sub_county_id, $facility_id, $msg_id);
                $this->b_data($safu, $msg_id);
                $kits = array(
                    'sms_status' => 2
                );
                $this->db->where('id', $id);
                $this->db->update('tbl_sms_broadcast', $kits);
            }
//            $this->b_data($safu);
            if ($current_date == $today) {
//            $this->b_data($safu);
            }
        }
    }

    function b_data($safu, $msg_id) {
//        $array = explode("+", $safu[0]);
        // print_r($safu[1]);
        foreach ($safu as $key => $value) {
//            echo 'Key '.$key.' Value '.$value.'<br>';
//            print_r($key);

            $toa = explode("+", $value);
        }
        // print_r($toa);
        foreach ($toa as $keys => $values) {
            // echo 'index ' . $key . ' Value ' . $values . '<br>';
            switch ($key) {
                case 0:
                    $cadres = $values;
//                        echo 'Key ' . $keys . ' Value ' . $cadres . '<br>';
                    break;
                case 1:
                    $county_id = $values;
//                        echo 'County ' . $keys . ' Value ' . $county_id . '<br>';
                    break;
                case 2:
                    $sub_county_id = $values;
//                        echo 'Index ' . $keys . ' Sub county ID  ' . $sub_county_id . '<br>';
                    break;
                case 3:
                    $mfl = $values;
//                        echo 'Index ' . $keys . ' MFL  ' . $mfl . '<br>';
                    break;
                default:
                    break;
            }

            $this->db->select('*');
            //check if client has disabled sms
            $this->db->where('sms_status = 1');
            $this->db->from('tbl_rawdata');

            if (!empty($county_id)) {
                $this->db->where('county_id', $county_id);
            }
            if (!empty($sub_county_id)) {
                $this->db->where('sub_county_id', $sub_county_id);
            }
            if (!empty($mfl)) {
                $this->db->where('mf_no', $mfl);
            }

            if (!empty($cadres)) {
                $this->db->where('cadre_id', $cadres);
            }
            $sql = $this->db->get()->result();
            foreach ($sql as $x) {
                $mno = $x->mobile_no;
                $client_id = $x->client_id;
                $cadre_id = $x->cadre_id;
                $county_id = $x->county_id;
                $sub_county = $x->sub_county_id;
                $fname = $x->first_name;
                $mfl_no = $x->mfl_no;

                $msg = str_replace("XXX", $fname, $msg_id);

//                <p>Search the string "Hello World!", find the value "world" and replace it with "Peter":</p>
//                echo str_replace("world", "Peter", "Hello world!");    
//                print_r($sql);
//                echo 'Cadre ' . $cadre_id . ' Jina ' . $fname . ' Namba ya ' . $mno . " msg " . $msg . " Counti " . $county_id . ' Facility ' . $mfl_no . " Client ID " . $client_id . "</br> ";
                $this->save_broadcast($mno, $msg);
            }
            //    echo 'Cadree ' . $cadre_id . ' Jina ' . $fname . ' Namba ya ' . $mno . " subcounty " . $sub_county . " Counti " . $county_id . ' Facility ' . $mfl_no . " Client ID " . $client_id . "</br> ";
//            $sql = $this->db->query("SELECT * FROM tbl_rawdata WHERE cadre_id='3'")->result();
//            echo 'Cadre ' . $cadres . ' County ' . $county_id . ' MFL  ' . $mfl . ' Subcounti  ' . $sub_county_id . '<br>';
        }
    }

    function save_broadcast($mno, $msg) {
        $data = array(
            'message' => $msg,
            'mobile_no' => $mno
//            'date' => 'My date'
        );

        $this->db->insert('tbl_logs_broadcast', $data);
//        $query = $this->db->query("INSERT INTO tbl_logs_broadcast (message,mobile_no) VALUES ('$msg','$mno')");
//        $this->send_broadcast();
    }

    function send_broadcast() {
        $query_2 = $this->db->query("SELECT id,message,mobile_no FROM tbl_logs_broadcast where status='1'")->result();

        foreach ($query_2 as $value) {
            $msg = $value->message;
            $mobile_no = $value->mobile_no;
            $id = $value->id;

            $mobile = substr($mobile_no, -9);
            $len = strlen($mobile);

            if ($len < 10) {
                $dest = "+254" . $mobile;
            }
            if ($dest <> '') {
                //call sender api fn to send messages
                $this->PostSMS($dest, $msg);
                //update status to sent to stop loops

                $kits = array(
                    'status' => 2
                );
                $this->db->where('id', $id);
                $this->db->update('tbl_logs_broadcast', $kits);

                echo 'Simu ' . $mobile_no . ' msg ' . $msg . "</br> ";
            } else {
                $out_put = " Reason: Phone number is missing";
                return $out_put;
            }
        }
    }
    
//    function b_data($county_id, $msg_id, $sub_county_id, $facility_id, $cadre_id) {
//
//        $array = explode("+", $cadre_id);
//        foreach ($array as $key => $value) {
//
//            switch ($value) {
//                case 1:
//                    $cadres = 1;
//                    break;
//                case 2:
//                    $cadres = 2;
//                    break;
//                case 3:
//                    $cadres = 3;
//                    break;
//                case 4:
//                    $cadres = 4;
//                    break;
//                case 5:
//                    $cadres = 5;
//                    break;
//                case 6:
//                    $cadres = 6;
//                    break;
//                case 7:
//                    $cadres = 7;
//                    break;
//                case 8:
//                    $cadres = 8;
//                    break;
//                case 9:
//                    $cadres = 9;
//                    break;
//                case 10:
//                    $cadres = 10;
//                    break;
//
//                default:
//                    $cadres = $cadre_id;
//
//                    break;
//            }
//        }
//
//        $this->db->select('mobile_no');
//        $this->db->from('tbl_patientdetails');
//        $this->db->join('master_facility', 'patientdetails.facility_id=master_facility.code ');
//
//
//        if (!empty($cadres)) {
//            if ($cadres == 10) {
//                
//            } else {
//                $this->db->join('cadre', 'cadre.id = tbl_patientdetails.cadre_id');
//                $this->db->where('cadre_id', $cadres);
//            }
//        }
//
//        if (!empty($facility_id)) {
//            if ($facility_id == 999) {
//                
//            } else {
//
//                $this->db->where('patientdetails.facility_id', $facility_id);
//            }
//        }
//        if (!empty($county_id)) {
//            if ($county_id == 48) {
//                
//            } else {
//                $this->db->join('county', 'county.id=master_facility.county_id');
//                $this->db->where('master_facility.county_id', $county_id);
//            }
//        }
//        if (!empty($sub_county_id)) {
//            if ($sub_county_id == 291) {
//                
//            } else {
//
//                $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
//                $this->db->where('sub_county.id', $sub_county_id);
//            }
//        }
//        $sql = $this->db->get()->result();
//        foreach ($sql as $x) {
//            $mno = $x->mobile_no;
//            //echo $cadre_id ." ".$msg_id." ".$mno."</br> ";
//
//            $this->insert_tbl_logs_broadcast($mno, $msg_id);
//
//            //$sql = $this->db->query($query)->result_array();                        
//        }
//        //exit();
//        return $sql;
//    }



    function insert_or_update_tblpatientdetails($new_level, $text, $level, $mno) {
        $pick_Level = $this->getLevel($mno, $level);
        foreach ($pick_Level as $value) {
            $hc_level = $value->level;
            $msg_id = $hc_level + 1;
            $report = $msg_id + 1;
            $id = $value->id;
            //Current date
            $current_time = date("Y-m-d");
            //Explode text message from inbox
            $msg = explode(" ", $text);
            $count_msg = count($msg);

            // echo 'HCW level = ' . $hc_level . '</br> ';

            if ($hc_level == 1) {

                $f_name = "";
                $l_name = "";
                $national_id = "";

                if ($count_msg == 3) {

                    $f_name = $msg[0];
                    $l_name = $msg[1];
                    $national_id = $msg[2];

//                    echo "First Name = " . $f_name . "</br>";
//                    echo "Lsst Name = " . $l_name . "</br>";
//                    echo "National ID = " . $national_id . "</br>";

                    if (is_string($f_name) && is_string($l_name) && ctype_digit($national_id) && ($national_id > 0 || $national_id <= 30)) {
                        $this->update_patientdetails($f_name, $l_name, $national_id, $msg_id, $mno);
                        //echo 'updated tbl_patientdetails -name and id ' . '</br>';
                    } else {
                        //echo 'Invalid Input hcw has swapped input fields' . '</br>';
                        $msg_id = 61;
                        $this->insert_outbox($mno, $msg_id);
                    }
                } else {
                    $msg_id = 61;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
            if ($hc_level == 2) {

                $cadre = "";
                $facility_id = "";
                $facility_length = "";

                if ($count_msg == 2) {
                    $cadre = $msg[0];
                    $facility_id = $msg[1];
                    if (ctype_digit($cadre) && ($cadre > 0 && $cadre <= 9 ) && ctype_digit($facility_id) && (strlen($facility_id) == '5')) {
                        $query_mfl = $this->db->query("SELECT CODE FROM tbl_master_facility where code='$facility_id'");
                        if ($query_mfl->num_rows() > 0) {
                            $this->update_patientdetails_insert_cadre($msg_id, $mno, $cadre, $facility_id);
//                            echo "Cadre = " . $cadre . "</br>";
//                            echo "MFL NO. = " . $facility_id . "</br>";
                        } else {
//MFL does not exist
                            $msg_id = 67;
                            $this->insert_outbox($mno, $msg_id);
                        }
                    } else {
                        $msg_id = 62;
                        $this->insert_outbox($mno, $msg_id);
                    }
                } else {
                    $msg_id = 62;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
            if ($hc_level == 3) {

                $gender = "";
                $yob = "";
                $age = "";

                if ($count_msg == 2) {

                    $gender = $msg[0];
                    $yob = $msg[1];
//check if one is 18 yars old.
                    if (ctype_digit($gender) && ($gender == 1 || $gender == 2) && (ctype_digit($yob) && ($yob > 1937 || $yob < 1999 ))) {
                        $this->update_patientdetails_insert_gender($msg_id, $mno, $gender, $yob);
//                        echo "Gender = " . $gender . "</br>";
//                        echo "YOB = " . $yob . "</br>";
                    } else {
                        $msg_id = 63;
                        $this->insert_outbox($mno, $msg_id);
                    }
                } else {
                    echo'Invalid input for gender and YOB';
                    $msg_id = 63;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
            if ($hc_level == 4) {
                $hep_response = "";
                if ($count_msg == 1) {
                    $hep_response = $msg[0];
                    if (ctype_digit($hep_response) && ($hep_response > 0 && $hep_response <= 3)) {
                        $this->hepatitis_B($mno, $msg_id, $hep_response);
                        //  echo 'Inserrted location = ' . $hep_response . "</br>";
                    } else {
                        $msg_id = 57;
                        $this->insert_outbox($mno, $msg_id);
                        //echo 'User inserted a number grater than 9';
                    }
                } else {
                    $msg_id = 57;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
//            if ($hc_level == 5) {
//                $this->prompt_one_to_report($msg_id, $mno);
//            }
            if ($hc_level == 6) {
                $r_response = "";
                if ($count_msg == 1) {
                    $r_response = $msg[0];
                    switch ($r_response) {
                        case 1:
                            $this->start_report($msg_id, $mno);
                            break;
                        case 2:
                            $this->technical_support($mno);
                            break;
                        default:
                            $msg_id = 6;
                            $this->insert_outbox($mno, $msg_id);
                            break;
                    }
                } else {
                    $msg_id = 6;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
            if ($hc_level == 7) {
                $e_type = "";
                $no_of_hours = "";
                // $re_ex_count = "";

                if ($count_msg == 2) {

                    $e_type = $msg[0];
                    $no_of_hours = $msg[1];

                    if (ctype_digit($e_type) && ($e_type > 0 && $e_type <= 6 ) && strlen($e_type) == 1 && ($no_of_hours > 0 && ctype_digit($no_of_hours))) {

                        if ($this->check_re_exposure($id) == "yes") {

                            $query_chk = $this->db->query("SELECT re_exposure_count FROM tbl_reports where p_details_id='$id'");
                            if ($query_chk->num_rows() > 0) {
                                $check = $query_chk->result();
                                $re_ex_count = "";
                                foreach ($check as $x) {
                                    $count = $x->re_exposure_count;
                                    $re_ex_count = $count + 1;

                                    $this->update_exposure_type($re_ex_count, $mno, $msg_id, $id, $e_type, $no_of_hours);
                                }
                            }
                        } elseif ($this->check_re_exposure($id) == "no") {
                            $this->report_exposure_type($mno, $msg_id, $id, $e_type, $no_of_hours);
                        }
                    } else {
                        $msg_id = 65;
                        $this->insert_outbox($mno, $msg_id);
                    }
                } else {
                    $msg_id = 65;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
            if ($hc_level == 8) {
                $e_location = "";
                if ($count_msg == 1) {
                    $e_location = $msg[0];
                    if (ctype_digit($e_location) && ($e_location > 0 && $e_location <= 9)) {
                        $this->report_location($report, $mno, $msg_id, $id, $e_location, $hc_level);
                        // echo 'Inserrted location = ' . $e_location . "</br>";
                    } else {
                        $msg_id = 66;
                        $this->insert_outbox($mno, $msg_id);
                        //echo 'User inserted a number grater than 9';
                    }
                } else {
                    $msg_id = 66;
                    $this->insert_outbox($mno, $msg_id);
                }
            }
        }
    }

    function update_inbox($new_level, $mno) {

        $UpdStatus = array(
            'sms_status' => 2,
            'level' => $new_level
        );
        $this->db->where('mobile_no', $mno);
        $this->db->update('tbl_logs_inbox', $UpdStatus);
    }

    function check_responses($hcw_id) {
        $querycheck = $this->db->query("SELECT response,p_details_id FROM tbl_reports where p_details_id='$hcw_id'");
        if ($querycheck->num_rows() > 0) {
            $response = $querycheck->result();
            return $response;
        } elseif ($querycheck->num_rows() <= 0) {
            $response = $querycheck->result();
            return $response;
        }
    }

    function messages_adherence($text, $adherence_level, $mob_no, $hcw_id) {
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$text','$mob_no')");
//$query = $this->db->query("update tbl_reports set adherence_level='$adherence_level' where p_details_id='$hcw_id'");
        $this->update_adherence_level($hcw_id, $adherence_level);
        $this->sender();
    }

    function messages_responses($text, $mob_no, $new_adherence, $hcw_id) {
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$text','$mob_no')");

        $this->sender();
        $this->update_res_level($new_adherence, $hcw_id);
    }

    function update_adherence_level($hcw_id, $adherence_level) {
        $query = $this->db->query("update tbl_reports set adherence_level='$adherence_level' where p_details_id='$hcw_id'");
    }

    function update_res_level($new_adherence, $hcw_id) {
        $query = $this->db->query("update  tbl_reports set response='$new_adherence' where p_details_id='$hcw_id'");
    }

    function insert_to_outbox($mno, $msg_id) {

        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");

        $this->sender();
    }

    function insert_outbox_not_registered($mno, $new_level) {
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$new_level','$mno')");

        $this->sender();
    }

    function insert_outbox($mno, $msg_id) {
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->sender();
    }

    function confirmatory_message_outbox($mno, $msg_id) {
//Add 1 to send a thank you message on complete registration
        $complete_registration = $msg_id + 1;
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");

        $this->sender();
    }

//Check if one has the rights to broadcast sms from mobile app.
    function IsFacilityUser($mno) {
        $query_a = $this->db->query("SELECT user_mobile,user_level from tbl_staffdetails where user_mobile='$mno' ");

        if ($query_a->num_rows() > 0) {
            $item = 'YES';
            $en = base64_encode($item);
            $text = 'CHKRIGHTS';
            $id1 = '<#> ';
            $id2 = '2C+posZ0ovi';

            $msg = $id1 . '' . $text . '*' . $en . ' ' . $id2;

            $this->PostSMS($mno, $msg);
        } else {
            $item = 'NO';
            $en = base64_encode($item);
            $text = 'CHKRIGHTS';
            $id1 = '<#> ';
            $id2 = '2C+posZ0ovi';

            $msg = $id1 . '' . $text . '*' . $en . ' ' . $id2;

            $this->PostSMS($mno, $msg);
        }

//        $complete_registration = 5;
//        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$complete_registration','$mno')");
        //$this->sender();
    }

    function c4c_sms($mno) {
        $complete_registration = 116;
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$complete_registration','$mno')");

        $this->sender();
    }

    function android_confirmatory_message_outbox($mno) {
        $complete_registration = 5;
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$complete_registration','$mno')");

        $this->sender();
        //Sends 
        $this->c4c_sms($mno);
    }

    function android_confirmatory_two_message_outbox($mno, $msg_id) {
//Add 1 to send a thank you message on complete registration.-C4C provides health care workers with information on occupational PEP and other health preventive and promotion services.<MOH>
        $complete_registration = 5;
        $query = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$complete_registration','$mno')");

        $this->sender();
    }

    function update_patientdetails($f_name, $l_name, $national_id, $msg_id, $mno) {
        $query = $this->db->query("update tbl_patientdetails SET f_name='$f_name',l_name='$l_name',national_id='$national_id',level='$msg_id' where mobile_no='$mno'");
//$query_update = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function update_patientdetails_insert_cadre($msg_id, $mno, $cadre, $facility_id) {
        $query = $this->db->query("update tbl_patientdetails SET cadre_id='$cadre',facility_id='$facility_id',level='$msg_id' where mobile_no='$mno'");
//$query_update = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function update_patientdetails_insert_gender($msg_id, $mno, $gender, $yob) {
        $query = $this->db->query("update tbl_patientdetails SET gender_id='$gender',DOB='$yob',level='$msg_id' where mobile_no='$mno'");
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function hepatitis_B($mno, $msg_id, $hep_response) {
        $query = $this->db->query("update tbl_patientdetails SET hepatitis_b='$hep_response',level='$msg_id' where mobile_no='$mno'");
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function prompt_one_to_report($msg_id, $mno) {
//Update level by one to allow continuation aftre full registration
        $query = $this->db->query("update tbl_patientdetails SET level='$msg_id' where mobile_no='$mno'");
//Call confirmatory_message_outbox fn to skip message number 5 from being sent agin since it is sent pon full registration
        $this->confirmatory_message_outbox($mno, $msg_id);
    }

    function start_report($msg_id, $mno) {
        $query = $this->db->query("update tbl_patientdetails SET level='$msg_id' where mobile_no='$mno'");
//$query_update = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no) VALUES ('$msg_id','$mno')");
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function technical_support($mno) {
//sent when user selecets option 2
        $msg_id = 64;
        $this->insert_outbox($mno, $msg_id);
        $query = $this->db->query("update tbl_logs_inbox SET level='$msg_id' where mobile_no='$mno'");
    }

    function re_exposureMsg0ne($mno, $msg_id) {
        $msg_id = 89;
        $this->insert_outbox($mno, $msg_id);
        $this->re_exposureMsgTwo($mno, $msg_id);
    }

    function re_exposureMsgTwo($mno, $msg_id) {
        $msg_id = 90;
        $this->insert_outbox($mno, $msg_id);
    }

    function report_all_re_exposure($id) {
        $tbl_reports_all = $this->db->query("select p_details_id,exposure_hours,exposure_type,exposure_location,adherence_level,date_exposed from tbl_reports where p_details_id='$id'");
        if ($tbl_reports_all->num_rows() > 0) {
            $tbl_reports_all = $tbl_reports_all->result();
            $hcwid = '';
            $e_hours = '';
            $e_type = '';
            $e_type = '';
            $ef_location = '';
            $d_exposed = '';
            foreach ($tbl_reports_all as $key) {
                $hcwid .= $key->p_details_id;
                $e_hours .= $key->exposure_hours;
                $e_type .= $key->exposure_type;
                $ef_location .= $key->exposure_location;

                $d_exposed .= $key->date_exposed;
                $query = $this->db->query("INSERT INTO tbl_reports_all(p_details_id,exposure_hours,exposure_type,date_exposed,exposure_location) VALUES ('$hcwid','$e_hours','$e_type','$d_exposed','$ef_location')");
            }
        }
    }

    function select_from_reports($id) {
//select from tbl_reports

        $tbl_reports_all = $this->db->query("select p_details_id,exposure_hours,exposure_type,exposure_location,adherence_level,date_exposed from tbl_reports where p_details_id='$id'");
        if ($tbl_reports_all->num_rows() > 0) {
            foreach ($tbl_reports_all as $key) {
                $hcwid = $key->p_details_id;
                $e_hours = $key->exposure_hours;
                $e_type = $key->exposure_type;
                $ef_location = $key->exposure_location;
                $a_level = $key->adherence_level;
                $d_exposed = $key->date_exposed;

                $this->report_location_all($hcwid, $e_hours, $e_type, $ef_location, $d_exposed);
            }
        }
    }

    function report_location_all($hcwid, $e_hours, $e_type, $ef_location, $d_exposed) {
        $query = $this->db->query("INSERT INTO tbl_reports_all(p_details_id,exposure_hours,exposure_type,date_exposed) VALUES ('$hcwid','$e_hours','$e_type','$d_exposed')");
    }

    function update_level_patientdetails($mno, $new_level) {
        $query = $this->db->query("update  tbl_patientdetails set level='$new_level' where mobile_no='$mno'");
    }

    function insert_patientdetails_insert_number($mno, $new_level) {
        $query = $this->db->query("insert INTO tbl_patientdetails (mobile_no,level) VALUES ('$mno','$new_level')");
    }

    function broadcast_sender() {
        $query = $this->db->query("SELECT id,message_id,mobile_no,p_level FROM tbl_logs_broadcast where status='1' limit 500")->result();
        foreach ($query as $value) {
            $id = $value->id;
            $messages_id = $value->message_id;
            $mobile_no = $value->mobile_no;

            $query_2 = $this->db->query("SELECT msg,id FROM tbl_sms_broadcast WHERE id='$messages_id'")->result();

            foreach ($query_2 as $value) {
                $msg = $value->msg;

                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }
                if ($dest <> '') {
                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
                    foreach ($query_name as $fnm) {
                        $name = $fnm->f_name;
                    }
                    //call sender api fn to send messages
//                    $this->PostSMS($dest, $msg);
//update status to sent to stop loops
                    $status = '2';
                    $query_update = $this->db->query("UPDATE tbl_logs_broadcast SET status ='$status' where mobile_no='$mobile_no'");
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function BroadcastSheet() {
        $query = $this->db->query("SELECT id,mobile_no FROM tbl_sheetdata where status='1'")->result();
        foreach ($query as $value) {
            $id = $value->id;
            $mobile_no = $value->mobile_no;

            $query_2 = $this->db->query("SELECT messages,id FROM tbl_messages WHERE id='116'")->result();

            foreach ($query_2 as $value) {
                $msg = $value->messages;
                $msg_id = $value->id;

                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }
                if ($dest <> '') {


//update status to sent to stop loops
                    $status = '2';
                    $query_update = $this->db->query("UPDATE tbl_sheetdata SET status ='$status' where mobile_no='$mobile_no'");


                    $out_status = '1';
                    $query_outbox = $this->db->query("INSERT INTO tbl_logs_outbox (message_id,mobile_no,status) VALUES ('$msg_id','$dest','$out_status')");

                    //call sender api fn to send messages
                    $this->sender();
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function sender() {

        $query = $this->db->query("SELECT id,message_id,mobile_no,STATUS FROM tbl_logs_outbox WHERE STATUS='1' ORDER BY id DESC")->result();
        foreach ($query as $value) {
            $id = $value->id;
            $messages_id = $value->message_id;
            $mobile_no = $value->mobile_no;

//insert HCW name into text
            $query_msgID = $this->db->query("SELECT messages,id FROM tbl_messages WHERE id='$messages_id'")->result();
            foreach ($query_msgID as $msg_ID) {
                $text = $msg_ID->messages;
                $Hello = strpos($text, 'Hello', 0);
                $welcome = strpos($text, 'Welcome', 0);
                $Hi = strpos($text, 'Hi', 0);
                $Dear = strpos($text, 'Dear', 0);


                if ($Hi !== false) {
                    $query_name = $this->db->query("SELECT tbl_patientdetails.f_name AS stud_name FROM tbl_patientdetails
                        INNER JOIN tbl_staffdetails ON tbl_staffdetails.`facility` = tbl_patientdetails.`facility_id`
                        INNER JOIN tbl_checkin ON tbl_checkin.mobile_no = tbl_patientdetails.mobile_no
                        WHERE tbl_staffdetails.`user_mobile` = $mobile_no AND tbl_checkin.CheckInStatus = 3 GROUP BY tbl_checkin.mobile_no")->result();
                    foreach ($query_name as $fnm) {
                        $name = $fnm->stud_name;
//substr_replace(string,replacement,start,length)
                        $msg = substr_replace($text, $name, 4, 0);
                        echo "Text -" . $msg;
                    }
                } else if ($Hello !== false) {
                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
                    foreach ($query_name as $fnm) {
                        $name = $fnm->f_name;
//substr_replace(string,replacement,start,length)
                        $msg = substr_replace($text, $name, 6, 0);
                        //echo "Text -" . $message;
                    }
                } else if ($welcome !== false) {
                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
                    foreach ($query_name as $nm) {
                        $fname = $nm->f_name;
//substr_replace(string,replacement,start,length)
                        $msg = substr_replace($text, $fname, 8, 0);
                    }
                } else if ($Dear !== false) {
                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_sheetdata  WHERE mobile_no='$mobile_no'")->result();
                    foreach ($query_name as $nm) {
                        $fname = $nm->f_name;
//substr_replace(string,replacement,start,length)
                        $msg = substr_replace($text, $fname, 5, 0);
                    }
                } else {

                    $msg = $text;
                }

                $mobile = substr($mobile_no, -9);
                $len = strlen($mobile);

                if ($len < 10) {
                    $dest = "+254" . $mobile;
                }

                if ($dest <> '') {
                    //call sender api fn to send messages
//                   $this->sender_api($dest, $msg);
                    $this->PostSMS($dest, $msg);
//                     echo 'hapa';
//                    exit();
                    //update status to sent to stop loops.
                    $status = '2';
                    $query_update = $this->db->query("UPDATE tbl_logs_outbox SET STATUS ='$status' where mobile_no='$mobile_no'");
                } else {
                    $out_put = " Reason: Phone number is missing";
                    return $out_put;
                }
            }
        }
    }

    function sender_api($dest, $msg) {




        $senderid = 40145;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "3001",
            CURLOPT_URL => "http://197.248.10.20:3001/api/senders/sender",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "destination: $dest",
                "msg: $msg",
                "source: $senderid"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

//    function sender() {
//
//        $query = $this->db->query("SELECT id,message_id,mobile_no,STATUS FROM tbl_logs_outbox WHERE STATUS='1' ORDER BY id DESC")->result();
//        foreach ($query as $value) {
//            $id = $value->id;
//            $messages_id = $value->message_id;
//            $mobile_no = $value->mobile_no;
//
////Insert HCW name into text
//            $query_msgID = $this->db->query("SELECT messages,id FROM tbl_messages WHERE id='$messages_id'")->result();
//            foreach ($query_msgID as $msg_ID) {
//                $text = $msg_ID->messages;
//                //exit;
//                $Hello = strpos($text, 'Hello', 0);
////                $welcome = strpos($text, 'Welcome', 0);
////                $Hi = strpos($text, 'Hi', 0);
////                $Dear = strpos($text, 'Dear', 0);
////                if ($Hi !== false) {
////                    $query_name = $this->db->query("SELECT tbl_patientdetails.f_name AS stud_name FROM tbl_patientdetails
////                        INNER JOIN tbl_staffdetails ON tbl_staffdetails.`facility` = tbl_patientdetails.`facility_id`
////                        INNER JOIN tbl_checkin ON tbl_checkin.mobile_no = tbl_patientdetails.mobile_no
////                        WHERE tbl_staffdetails.`user_mobile` = $mobile_no AND tbl_checkin.CheckInStatus = 3 GROUP BY tbl_checkin.mobile_no")->result();
////                    foreach ($query_name as $fnm) {
////                        $name = $fnm->stud_name;
//////substr_replace(string,replacement,start,length)
////                        $msg = substr_replace($text, $name, 4, 0);
////                        echo "Text -" . $msg;
////                    }
////                }
////                if ($Hello !== false) {
//                $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
//                foreach ($query_name as $fnm) {
//                    $name = $fnm->f_name;
////substr_replace(string,replacement,start,length)
//                    $msg = substr_replace($text, $name, 6, 0);
//                    echo "Text -" . $msg;
//                    //exit;
////                }
////                else if ($welcome !== false) {
////                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_patientdetails  WHERE mobile_no='$mobile_no'")->result();
////                    foreach ($query_name as $nm) {
////                        $fname = $nm->f_name;
//////substr_replace(string,replacement,start,length)
////                        $msg = substr_replace($text, $fname, 8, 0);
////                    }
////                } 
////                else if ($Dear !== false) {
////                    $query_name = $this->db->query("SELECT f_name,mobile_no FROM tbl_sheetdata  WHERE mobile_no='$mobile_no'")->result();
////                    foreach ($query_name as $nm) {
////                        $fname = $nm->f_name;
//////substr_replace(string,replacement,start,length)
////                        $msg = substr_replace($text, $fname, 5, 0);
////                    }
////                }
////                else {
////                    $msg = $text;
////                }
//
//                    $mobile = substr($mobile_no, -9);
//                    $len = strlen($mobile);
//
//                    if ($len < 10) {
//                        echo $dest = "+254" . $mobile;
//                        echo $msg;
//                    exit;
////                    $this->sender_api($dest, $msg);
//                    }
//
//                    if ($dest <> '') {
//                        //call sender api fn to send messages
////                        $this->sender_api($dest, $msg);
//                        //update status to sent to stop loops.
//                        $status = '2';
////                    $query_update = $this->db->query("UPDATE tbl_logs_outbox SET STATUS ='$status' where mobile_no='$mobile_no'");
//                    } else {
//                        $out_put = " Reason: Phone number is missing";
//                        return $out_put;
//                    }
//                }
//            }
//        }
//    }


    function confirmatory_message() {
        $query_outbox = $this->db->query("SELECT mobile_no,message_id,date_created,mobile_no FROM tbl_logs_outbox WHERE message_id=5");
        if ($query_outbox->num_rows() > 0) {
            $minutes = $query_outbox->result();
            foreach ($minutes as $m) {
                $date = $m->date_created;
                $mno = $m->mobile_no;
                $date_sent = strtotime($date);
                $datetime = strtotime("now");

                $substract = $datetime - $date_sent;
                $r_minutes = $substract / 60;
                $minutes = round($r_minutes);
                //echo 'This=>'." ".$minutes."  ".$mobile_no;
                //echo 'This>' . " " . $minutes . " <br/> " . $mno;
                if ($minutes <= 5) {
                    //echo 'This=>' . " " . $minutes . " <br/> " . $mno;
                    $this->confirm_registration_text($mno);
                }
            }
        }
    }

    function confirm_registration_text($mno) {
        $msg_id = 31;
        $new_level = 6;
        $this->update_inbox($new_level, $mno);
        $this->insert_outbox($mno, $msg_id);
        $this->update_level_patientdetails($mno, $new_level);
    }

    function check_re_exposure($id) {
        $q_check = $this->db->query("SELECT p_details_id FROM tbl_reports where p_details_id='$id'");
        if ($q_check->num_rows() > 0) {
            return "yes";
        } else if ($q_check->num_rows() <= 0) {
            return "no";
        }
    }

    function is_exposed($id) {
        $q_check = $this->db->query("SELECT p_details_id,exposure_hours,date_exposed FROM tbl_reports where p_details_id='$id'");
        if ($q_check->num_rows() > 0) {
            $yes_exposed = $q_check->result();
            return $yes_exposed;
        } else if ($q_check->num_rows() <= 0) {
            return "Not Found";
//echo 'nothing found';
        }
    }

    function responses_to_adherence() {

        $query_a = $this->db->query("SELECT p_details_id ,mobile_no ,exposure_hours,date_exposed FROM `tbl_patientdetails` INNER JOIN tbl_reports ON `tbl_reports`.`p_details_id`=`tbl_patientdetails`.`id`");
        if ($query_a->num_rows() > 0) {
            $exposure_hours = $query_a->result();
            foreach ($exposure_hours as $e_hours) {
                $exp_hours = $e_hours->exposure_hours;
                $r_date = $e_hours->date_exposed;
                $hcw_id = $e_hours->p_details_id;
                $mob_no = $e_hours->mobile_no;
                $current_time = date("Y-m-d H:i:s");
                $datetime = strtotime("now");
                $report_date = strtotime($r_date);
                $no_after = $datetime - $report_date;
                $days = $no_after / 86400;
                $r_days = round($days);
                $hours = $no_after / 3600;
                $total_hours = $hours + $exp_hours;
                $rnd_hours = round($total_hours);
                $r_minutes = $no_after / 60;
                $minutes = round($r_minutes);

                $h_hours = round($total_hours);

// $t_hours = $hours + 6;
//echo $minutes . "</br> ";
                //echo " HCW id = " . $hcw_id . "</br> " . " Current Time= " . $current_time . "</br> " . "Sum of hours after exposure + current time = " . $h_hours . "</br>" . "Hours after exposure on report =" . $exp_hours . "</br> " . "Number of days after exposure =" . $r_days . "</br> " . "Minutes after exposure = " . $minutes . "</br>" . "</br>";
//24 hours

                if ($exp_hours >= 72) {

                    $query_date = $this->db->query("SELECT message_id,mobile_no,date_created FROM tbl_logs_outbox WHERE mobile_no='$mob_no' AND message_id= '71' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_created;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";


                            if ($round_mins < 5) {
                                $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes'");
                                if ($query_date->num_rows() > 0) {
                                    $date = $query_date->result();
                                    foreach ($date as $dates) {
                                        $date_rcd = $dates->date_received;
                                        $date_ex = (explode(" ", $date_rcd));
                                        $date_rcvd = $date_ex[0];

                                        $now = date("Y-m-d H:i:s");
                                        $right_now = $now[0];
                                        $date_now = (explode(" ", $right_now));
                                        $sahii = $date_now[0];

                                        $date_created = strtotime($date_rcd);
                                        $minutes_diff = $dfatetime - $date_created;
                                        $minutes_e = $minutes_diff / 60;
                                        $round_mins = round($minutes_e);
                                        echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";


                                        if ($query_date->num_rows() > 0 && $round_mins < 5) {
                                            $text = 16;
                                            $new_adherence = 1;
                                            $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                                        }
                                    }
                                }

                                $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                                if ($query_date->num_rows() > 0) {
                                    $date = $query_date->result();
                                    foreach ($date as $dates) {
                                        $date_rcd = $dates->date_received;
                                        $date_ex = (explode(" ", $date_rcd));
                                        $date_rcvd = $date_ex[0];

                                        $now = date("Y-m-d H:i:s");
                                        $right_now = $now[0];
                                        $date_now = (explode(" ", $right_now));
                                        $sahii = $date_now[0];

                                        $date_created = strtotime($date_rcd);
                                        $minutes_diff = $datetime - $date_created;
                                        $minutes_e = $minutes_diff / 60;
                                        $round_mins = round($minutes_e);
                                        //echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                                        if ($round_mins < 5) {
                                            $text = 14;
                                            $new_adherence = 2;
                                            $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ($h_hours == 24) {

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
// echo $minutes . "</br> ";
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            //echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br>" . "</br>";

                            if ($query_date->num_rows() > 0 && $round_mins < 5) {
                                $text = 11;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 12;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 48) {
//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            //echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 11;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";
                            if ($round_mins < 5) {
                                $text = 14;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 60) {


//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 11;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 14;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
// one who responds to 72 hour message-yes response
                if ($exp_hours == 72) {

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 17;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 18;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 96) {



                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 24;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 25;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 216) {



//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 24;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 25;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 720) {
//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 11;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 12;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 744) {

//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";
                            if ($round_mins < 5) {
                                $text = 11;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 12;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 2208) {


//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 24;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 29;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 2256) {


//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 24;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins <= 5) {
                                $text = 29;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
                if ($h_hours == 4368) {


//Handle responses after the hourly message- Yes or No

                    $query_date = $this->db->query("SELECT msg,date_received,msg FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%yes' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message was received in tbl_inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 84;
                                $new_adherence = 1;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }

                    $query_date = $this->db->query("SELECT msg,date_received FROM tbl_logs_inbox WHERE mobile_no='$mob_no' AND msg LIKE '%no' ");
                    if ($query_date->num_rows() > 0) {
                        $date = $query_date->result();
                        foreach ($date as $dates) {
                            $date_rcd = $dates->date_received;
                            $date_ex = (explode(" ", $date_rcd));
                            $date_rcvd = $date_ex[0];

                            $now = date("Y-m-d H:i:s");
                            $right_now = $now[0];
                            $date_now = (explode(" ", $right_now));
                            $sahii = $date_now[0];

                            $date_created = strtotime($date_rcd);
                            $minutes_diff = $datetime - $date_created;
                            $minutes_e = $minutes_diff / 60;
                            $round_mins = round($minutes_e);
                            echo "Minutes after message hit inbox = " . $round_mins . "</br> ";

                            if ($round_mins < 5) {
                                $text = 29;
                                $new_adherence = 2;
                                $this->messages_responses($text, $mob_no, $new_adherence, $hcw_id);
                            }
                        }
                    }
                }
            }
        }
    }

    function adherence() {
        $query_a = $this->db->query("SELECT mobile_no,f_name,p_details_id ,mobile_no ,exposure_hours,date_exposed FROM `tbl_patientdetails` INNER JOIN tbl_reports ON `tbl_reports`.`p_details_id`=`tbl_patientdetails`.`id` where sms_enabled = 1");
        $exposure_hours = $query_a->result();
        foreach ($exposure_hours as $e_hours) {
            $exp_hours = $e_hours->exposure_hours;
            $r_date = $e_hours->date_exposed;
            $hcw_id = $e_hours->p_details_id;
            $mob_no = $e_hours->mobile_no;
            $name = $e_hours->f_name;
            $number = $e_hours->mobile_no;
            $current_time = date("Y-m-d H:i:s");
            $datetime = strtotime("now");
            $report_date = strtotime($r_date);
            $no_after = $datetime - $report_date;
            $ddays = $no_after / 86400;
            $r_days = round($ddays);
            $hours = $no_after / 3600;
            $total_hours = $hours + $exp_hours;
            $rnd_hours = round($total_hours);
            $r_minutes = $total_hours * 60;
            $minutes = round($r_minutes);
            $h_hours = round($total_hours);


            //echo "ID = " . $hcw_id . "</br> " . " Mobile Number = " . $number . "</br>" . " Date Exposed= " . $r_date . "</br> " . "Sum of hours after exposure + current time = " . $h_hours . "</br>" . "Hours after exposure on report =" . $exp_hours . "</br> " . "Number of days after exposure =" . $r_days . "</br> " . "Minutes after exposure = " . $minutes . "</br>" . "</br>";

            if ($minutes == 1440) {
                $text = 10;
                $adherence_level = 1;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 2880 && $exp_hours > 24) {
                $text = 13;
                $adherence_level = 2;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 3600 && $exp_hours > 48) {
                $text = 15;
                $adherence_level = 3;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 5760) {
                $text = 28;
                $adherence_level = 5;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 7200) {
                $text = 20;
                $adherence_level = 7;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
                //            if ($minutes == 7560) {
                //                $text = 21;
                //                $adherence_level = 8;
                //                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                //            }
            if ($minutes == 10080) {
                $text = 55;
                $adherence_level = 9;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 12960) {
                $query_date = $this->db->query("SELECT response,p_details_id FROM tbl_reports WHERE p_details_id='$hcw_id' AND  response='1' OR response='2' ");
                if ($query_date->num_rows() > 0) {
                    $text = 23;
                    $adherence_level = 10;
                    $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                }
            }
            if ($minutes == 14400) {
                $query_date = $this->db->query("SELECT response,p_details_id FROM tbl_reports WHERE p_details_id='$hcw_id AND response='2' ");
                if ($query_date->num_rows() > 0) {
                    if ($query_date_created->num_rows() < 0 && $days == 1) {
                        echo "</br>" . "Minutes after message was sent from tbl_outbox table = " . $r_mins . "</br> ";
                        $text = 23;
                        $adherence_level = 11;
                        $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                    }
                }
            }
            if ($minutes == 17280) {

                $text = 26;
                $adherence_level = 12;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 20160) {
                $text = 22;
                $adherence_level = 13;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 23040) {

                $text = 27;
                $adherence_level = 14;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 24480) {
                $query_date = $this->db->query("SELECT response,p_details_id FROM tbl_reports WHERE p_details_id='$hcw_id' AND response='2' ");
                if ($query_date->num_rows() > 0) {

                    //echo "</br>" . "Minutes after message was sent from tbl_outbox table = " . $r_mins . "</br> ";
                    $text = 27;
                    $adherence_level = 15;
                    $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                }
            }
            if ($minutes == 30240) {
                $text = 41;
                $adherence_level = 16;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 37440) {
                $text = 42;
                $adherence_level = 17;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 40320) {
                $text = 43;
                $adherence_level = 18;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 43200) {
                $text = 44;
                $adherence_level = 19;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 44640) {
                $text = 44;
                $adherence_level = 20;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 69120) {
                $text = 46;
                $adherence_level = 21;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 89280) {

                $text = 47;
                $adherence_level = 22;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 109440) {

                $text = 76;
                $adherence_level = 23;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 126720) {
                $text = 77;
                $adherence_level = 24;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 129600) {

                $text = 78;
                $adherence_level = 25;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 132480) {

                $text = 79;
                $adherence_level = 26;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 135360) {
                $query_date = $this->db->query("SELECT response,p_details_id FROM tbl_reports WHERE p_details_id='$hcw_id' AND response='2' ");
                if ($query_date->num_rows() > 0) {

                    //echo "</br>" . "Minutes after message was sent from tbl_outbox table = " . $r_mins . "</br> ";
                    $text = 83;
                    $adherence_level = 27;
                    $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                }
            }

            if ($minutes == 198720) {

                $text = 80;
                $adherence_level = 28;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 239040) {
                $text = 81;
                $adherence_level = 29;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 256320) {

                $text = 82;
                $adherence_level = 30;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 262080) {

                $text = 83;
                $adherence_level = 31;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }
            if ($minutes == 264960) {
                $text = 84;
                $adherence_level = 32;
                $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            }

            $query_response = $this->db->query("SELECT response from tbl_reports where p_details_id='$hcw_id' and response ='0'");
            if ($query_response->num_rows() > 0) {
                if ($minutes == 2880) {
                    $text = 13;
                    $adherence_level = 2;
                    $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                }
            }
            $query_response = $this->db->query("SELECT response from tbl_reports where p_details_id='$hcw_id' and response ='0'");
            if ($query_response->num_rows() > 0) {
                if ($minutes == 3600) {
                    $text = 15;
                    $adherence_level = 3;
                    $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                }
            }




            //            $query_date_created = $this->db->query("SELECT date_received,msg FROM `tbl_logs_inbox` WHERE msg LIKE '%yes'  and mobile_no='$mob_no'");
            //            if ($query_date_created->num_rows() > 0) {
            //                $date = $query_date_created->result();
            //                foreach ($date as $dates) {
            //                    $r_date = $dates->date_received;
            //                    $date_sent = strtotime($r_date);
            //                    $datetime = strtotime("now");
            //                    $substract = $datetime - $date_sent;
            //                    $r_days = $substract / 86400;
            //                    $response_hour = $substract / 3600;
            //                    $res_hours = round($response_hour);
            //                    $days = round($r_days);
            //
            //                    if ($minutes == 4320 && $res_hours <= 1) {
            //                        $text = 71;
            //                        $adherence_level = 4;
            //                        $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
            //                    }
            //                }
            //            }

            $response = $this->check_responses($hcw_id);
            foreach ($response as $res) {
                $yes_no = $res->response;
                if ($yes_no == 0) {
                    if ($minutes == 6000) {
                        $text = 28;
                        $adherence_level = 6;
                        $this->messages_adherence($text, $adherence_level, $mob_no, $hcw_id);
                    }
                }
            }
        }
    }

    function age_groupp() {

        $get_dob = $this->db->query("Select tbl_patientdetails.id, tbl_patientdetails.DOB from tbl_patientdetails inner join tbl_master_facility "
                        . "on tbl_master_facility.code = tbl_patientdetails.facility_id ")->result_array();

        foreach ($get_dob as $value) {
            $id = $value['id'];
            $crnt_date = (int) date('Y');
            $dob = $value['DOB'];
            $mydate = (int) $dob;

            if (($crnt_date - $mydate) >= 15 && ($crnt_date - $mydate) <= 19) {
                $x = 1;
            }
            if (($crnt_date - $mydate) >= 20 && ($crnt_date - $mydate) <= 24) {
                $x = 2;
            }
            if (($crnt_date - $mydate) >= 25 && ($crnt_date - $mydate) <= 29) {
                $x = 3;
            }
            if (($crnt_date - $mydate) >= 30 && ($crnt_date - $mydate) <= 34) {
                $x = 4;
            }
            if (($crnt_date - $mydate) >= 35 && ($crnt_date - $mydate) <= 39) {
                $x = 5;
            }
            if (($crnt_date - $mydate) >= 40 && ($crnt_date - $mydate) <= 44) {
                $x = 6;
            }
            if (($crnt_date - $mydate) >= 45 && ($crnt_date - $mydate) <= 49) {
                $x = 7;
            }
            if (($crnt_date - $mydate) >= 50 && ($crnt_date - $mydate) <= 54) {
                $x = 8;
            }
            if (($crnt_date - $mydate) > 54) {
                $x = 9;
            }

            $this->db->query("UPDATE tbl_patientdetails set age_group = $x where id = $id");
        }
    }

}
