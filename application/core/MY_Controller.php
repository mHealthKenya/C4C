<?php

use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {

    public $hc;

    function __construct() {
        parent::__construct();
    }

    function check_access() {
        $logged_in = $this->session->userdata("logged_in");

        if ($logged_in) {
            $first_access = $this->session->userdata('first_access');
            $user_id = $this->session->userdata('user_id');
            if ($first_access == "Yes") {
                redirect("reset/reset_pass/$user_id", "refresh");
            } else {
                
            }
        } else {
            // redirect("Login", "refresh");
        }
    }

    function check_authorization($function_name) {
        $user_id = $this->session->userdata('user_id');
        $check_acess = $this->db->query("Select * from tbl_module inner join tbl_user_permission on tbl_user_permission.module_id = tbl_module.id where tbl_module.status='Active' and tbl_user_permission.user_id='$user_id' and tbl_module.function='$function_name'")->num_rows();
        if ($check_acess > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_access_level() {
        $access_level = $this->session->userdata('access_level');
        $facility_id = $this->session->userdata('facility_id');
        $partner_id = $this->session->userdata('partner_id');
        $donor_id = $this->session->userdata('donor_id');
        $county_id = $this->session->userdata('county_id');
        $subcounty_id = $this->session->userdata('subcounty_id');

        if ($access_level == "Donor") {
            $query = "Select name from tbl_donor where id='$donor_id'";
        } elseif ($access_level == "Partner") {
            $query = "Select name from tbl_partner where id='$partner_id'";
        } elseif ($access_level == "Facility") {

            $query = "Select name,code from tbl_master_facility where code='$facility_id'";
        } elseif ($access_level == "Admin") {

            $query = "Select name from tbl_partner where id = '$partner_id'";
        } elseif ($access_level == "County") {

            $query = "Select name from tbl_county where id = '$county_id'";
        } elseif ($access_level == "Sub County") {

            $query = "Select name from tbl_sub_county where id = '$subcounty_id'";
        }
        $results = $this->db->query($query)->result();

        return $results;
    }

    function get_partner_filters() {
        $access_level = $this->session->userdata('access_level');
        $facility_id = $this->session->userdata('facility_id');
        $partner_id = $this->session->userdata('partner_id');
        $donor_id = $this->session->userdata('donor_id');
        $county_id = $this->session->userdata('county_id');
        $subcounty_id = $this->session->userdata('subcounty_id');

        if ($access_level == "Donor") {
            $query = "Select id as partner_id , name as partner_name from tbl_partner ";
        } elseif ($access_level == "Partner") {
            $query = "Select id as partner_id , name as partner_name from tbl_partner where id='$partner_id'";
        } else {
            $query = "Select id as partner_id , name as partner_name from tbl_partner ";
        }
        $results = $this->db->query($query)->result();

        return $results;
    }

    function get_county_filtered_values() {
        $access_level = $this->session->userdata('access_level');
        $facility_id = $this->session->userdata('facility_id');
        $partner_id = $this->session->userdata('partner_id');
        $donor_id = $this->session->userdata('donor_id');
        $county_id = $this->session->userdata('county_id');
        $sub_county_id = $this->session->userdata('sub_county_id');
        if ($access_level == "Donor") {
            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` GROUP BY tbl_county.id ";
        } elseif ($access_level == "Partner") {
            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` where tbl_partner_facility.partner_id='$partner_id' GROUP BY tbl_county.id ";
        } elseif ($access_level == "County") {


            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county "
                    . " INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` "
                    . " where tbl_partner_facility.county_id='$county_id' GROUP BY tbl_county.id ";
        } elseif ($access_level == "Sub County") {


            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county "
                    . " INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` "
                    . " where tbl_partner_facility.county_id='$county_id' AND tbl_partner_facility.sub_county_id='$sub_county_id' GROUP BY tbl_county.id ";
        } elseif ($access_level == "Facility") {


            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` where tbl_partner_facility.partner_id='$partner_id' GROUP BY tbl_county.id ";
        } else {
            $query = "SELECT tbl_county.name as county_name , tbl_county.id as county_id FROM tbl_county INNER JOIN tbl_partner_facility ON tbl_partner_facility.`county_id` = tbl_county.`id` GROUP BY tbl_county.id ";
        }
        $results = $this->db->query($query)->result();

        return $results;
    }

    function load_scripts() {
        $script = new Highchart();
        return $script->printScripts(TRUE);
    }

    function remote_addr() {
        $server_address = $_SERVER['SERVER_ADDR'];

        if ($server_address === "192.168.100.2") {


            echo "Local Server Address => " . $_SERVER['SERVER_ADDR'];
            log_message('info', 'Remote Address 192.168.100.2');
            $api = $this->config->item('local_gateway', 'config');
            $port = "3001";
            // Retrieve a config item named site_name contained within the blog_settings array
            echo $api;
        } else {

            echo "Online Server Address => " . $_SERVER['SERVER_ADDR'];
            log_message('info', 'Online Gateway gateway-api.mhealthkenya.co.ke ');
            $api = $this->config->item('online_gateway', 'config');
            $port = "";
            // Retrieve a config item named site_name contained within the blog_settings array
            echo $api;
        }
    }

    function send_email($to = null, $msg = null, $cc = null, $bcc = null, $subject = null, $attachment = null) {
        //Load email library
        $this->load->library('email');



        //SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'sshaccess@mhealthkenya.org',
            'smtp_pass' => 'ck989SL5451S3W',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");


        $this->email->to($to);
        $this->email->cc($cc);
        $this->email->bcc($bcc);
        $this->email->from('support.tech@mhealthkenya.org', 'Ushauri System');
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->attach($attachment);

//Send email
        $this->email->send();

        $output = $this->email->print_debugger();

        return $output;
    }

    function AT_SMS($source, $destination, $msg, $outgoing_id) {


        // Set your app credentials
        $username = "mhealthkenya";
        $apiKey = "9318d173cb9841f09c73bdd117b3c7ce3e6d1fd559d3ca5f547ff2608b6f3212";

// Initialize the SDK
        $AT = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms = $AT->sms();


        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to' => $destination,
                'message' => $msg,
                'from' => $source
            ]);


            $level = 'info';
            log_message($level, $result);
        } catch (Exception $e) {

            $level = 'error';
            log_message($level, $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    function PostSMS($source, $destination, $msg, $outgoing_id) {
        //Africa's Talking Library.
        require_once('AfricasTalkingGateway.php');
        //Africa's Talking API key and username.
        $username = 'mhealthkenya';
        $apikey = '9318d173cb9841f09c73bdd117b3c7ce3e6d1fd559d3ca5f547ff2608b6f3212';
        //Shortcode.
        $gateway = new AfricasTalkingGateway($username, $apikey);
        try {
            $results = $gateway->sendMessage($destination, $msg, $source);
            $level = 'info';
            log_message($level, $results);
//            echo 'Great,SMS sent';
        } catch (GatewayException $e) {
            echo "Oops an error encountered while sending: " . $e->getMessage();
            $level = 'error';
            log_message($level, $e->getMessage());
        }
    }

    function check_username($username) {
        return $this->db->get_where('users', array('username' => $username))->result_array();
    }

    function check_email($e_mail) {
        return $this->db->get_where('users', array('e_mail' => $e_mail));
    }

    function check_phoneno($phoneno) {
        return $this->db->get_where('users', array('phone_no' => $phoneno));
    }

    function send_message($source = null, $destination = null, $msg = null, $clnt_outgoing_id = null) {
        $username = "mhealthkenya";
        $apikey = "9318d173cb9841f09c73bdd117b3c7ce3e6d1fd559d3ca5f547ff2608b6f3212";

        $gateway = new AfricasTalkingGateway($username, $apikey);

        $results = $gateway->sendMessage($destination, $msg, $source);
        if ($results[0]->status == "Success") {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
