    <?php

ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');

defined('BASEPATH') OR exit('No direct script access allowed');

class core extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public $data = 'Processor';

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');

        $this->load->model('Processor');
        $this->data = new Processor();
    }
    function syncExposures(){
        $this->data->syncExposures();
        
    }

    function syncRawData(){
        $this->data->syncRawData();
        
    }

    function CountySearchTest() {
        echo "In here";

    }



    function CountySearch() {
    
        $returned_value = $this->data->SearchCnty();

        $items = json_encode(array('result' => $returned_value));
        echo $items;
    }

    function SubCountySearch() {
        $SubcntyDATA = array(
            'cntyID' => $this->input->post('cntyID')
        );
        $this->data->SearchSub($SubcntyDATA);
    }

    function FacSearch() {
        $facDATA = array(
            'mfl' => $this->input->post('mfl')
        );
        $this->data->SearchFac($facDATA);
    }

    function FacilitySearch() {
        $facltyDATA = array(
            'cntyID' => $this->input->post('mfl')
        );
        $this->data->SearchCnty($facltyDATA);
    }

    //Android App API gets county,  sub-county and facility
    function get_facility_info() {

        $returned_value = $this->data->get_facility_info();

        $items = json_encode(array('result' => $returned_value));
        echo $items;

    }
    

    function fixsms() {
        $dest = '+254728802160';
        $msg = 'Hello Kipkorir';

        $this->data->PostSMS($dest, $msg);
    }


    //Android signup API
    function AppReg() {
        $default_level = 3;

        $SignUp = array(
            'f_name' => $this->input->post('fname'),
            'l_name' => $this->input->post('lname'),
            'username' => $this->input->post('uname'),
            'password' => $this->input->post('pwd'),
            'sec_quiz' => $this->input->post('secqn'),
            'secans' => $this->input->post('ans'),
            'mobile_no' => $this->input->post('phone_no'),
            'level' => $default_level
        );

        $this->data->RegApp($SignUp);
    }

    function add() {

        $getnewid = $this->db->query("select * from tbl_patientdetails_copy");

        if ($getnewid->num_rows() > 0) {
            foreach ($getnewid->result() as $value) {
                $id = $value->id;
                $mfl = $value->facility_id;

                $getMFL = $this->db->get_where('tbl_master_facility_copy', array('name' => $mfl));

                if ($getMFL->num_rows() > 0) {
                    foreach ($getMFL->result() as $value) {
                        $mflid = $value->code ;

                        $Register = array(
                            'facility_id' => $mflid
                        );
                        echo 'Updated No => ' . $mflid . '</br>';
                        $this->db->where('id', $id);
                        $this->db->update('tbl_patientdetails_copy', $Register);
                    }
                }
            }
        }
    }

    function chkMobile(){
         $Mno = array(
            'mobile_no' => $this->input->post('phone_no')
            );
            $this->data->SearchMobile($Mno);

    }
    function hi(){
        $mydob = '14/01/1962';

        // $mydob = $Prof['DOB'];
        $date = str_replace('/', '-', $mydob);
        echo $dob = date('Y-m-d', strtotime($date));

    }



    function SignUp() {
        
        $default_level = 3;
        $mode = 2;

        $SignUp = array(
            'f_name' => $this->input->post('fname'),
            'l_name' => $this->input->post('lname'),
            'cadreOther' => $this->input->post('other_cadre'),
            'hepatitis_b' => $this->input->post('hbv1'),
            'firstdose' => $this->input->post('dose1'),
            'hbv2' => $this->input->post('hbv2'),
            'seconddose' => $this->input->post('dose2'),
            'mobile_no' => $this->input->post('phone_no'),
            'partner_id' => $this->input->post('partner'),
            // 'specs' => $this->input->post('specs'),
            'gender_id' => $this->input->post('gender'),
            'cadre_id' => $this->input->post('cdr'),
            'national_id' => $this->input->post('idno'),
            'DOB' => $this->input->post('dob'),
            'facility_id' => $this->input->post('mflno'),
            //Update Level
            'level' => $default_level,
            'registrationmode' => $mode
        );

        $this->data->RegAppFac($SignUp); 
     
        
    }
    function SignUpTest() {

        $SignUp = array(
            'f_name' => $this->input->post('fname'),
            'l_name' => $this->input->post('lname'),
            // 'username' => $this->input->post('uname'),
            // 'password' => $this->input->post('pwd'),
            // 'sec_quiz' => $this->input->post('secqn'),
            // 'secans' => $this->input->post('ans'),
            'mobile_no' => $this->input->post('phone_no'),
            'partner_id' => $this->input->post('partner'),
            // 'specs' => $this->input->post('specs'),
            'gender_id' => $this->input->post('gender'),
            'cadre_id' => $this->input->post('cdr'),
            'national_id' => $this->input->post('idno'),
            'DOB' => $this->input->post('dob'),
            'facility_id' => $this->input->post('mflno'),
            //Update Level
            'level' => $default_level
        );

        $this->data->RegAppFac($SignUp);
    }
    
    function CreateProf() {
        $default_level = 3;
        $mode = 2;
        
        $SignUp = array(
            'f_name' => $this->input->post('fname'),
            'l_name' => $this->input->post('lname'),
            'cadreOther' => $this->input->post('other_cadre'),
            'hepatitis_b' => $this->input->post('hbv'),
            'firstdose' => $this->input->post('fdose'),
            'seconddose' => $this->input->post('sdose'),
            'mobile_no' => $this->input->post('phone_no'),
            'partner_id' => $this->input->post('partner'),
            // 'specs' => $this->input->post('specs'),
            'gender_id' => $this->input->post('gender'),
            'cadre_id' => $this->input->post('cdr'),
            'national_id' => $this->input->post('idno'),
            'DOB' => $this->input->post('dob'),
            'facility_id' => $this->input->post('mflno'),
            //Update Level
            'level' => $default_level,
            'registrationmode' => $mode
        );      

        $this->data->RegAppFac($SignUp);      
        
    }

    function CreateProfTest() {
        $default_level = 5;
        $Prof = array(
            'partner_id' => $this->input->post('partner'),
            'specs' => $this->input->post('specs'),
            'gender_id' => $this->input->post('gender'),
            'cadre_id' => $this->input->post('cdr'),
            'national_id' => $this->input->post('idno'),
            'DOB' => $this->input->post('dob'),
            'facility_id' => $this->input->post('mflno'),
            'mobile_no' => $this->input->post('phone_no'),
            //Update Level
            'level' => $default_level
        );

        $this->data->CreateProfTest($Prof);
    }
    //Broadcast SMS API
    function bSMS(){

         $bm = array(
        'message_id' => $this->input->post('text')
        // 'sms_datetime' => $this->input->post('sendDate'),
        // 'cadre_id' => $this->input->post('cdr'),
        // 'broadcastname' => $this->input->post('bname'),
        // 'phone' => $this->input->post('phone')
        );
         // print_r($bm);
         $this->logbSMS($bm);
         $this->ebola($bm);
        // $this->data->Bsms($bm);
    }
    function e_send(){
         // $this->data->ebola_sender();
                 $this->data->broadcast();

    }
    function send_broadcast() {
        $this->data->send_broadcast();
    }


    function ebola($bm) {

         // print_r($  bm);

        $query = $this->db->query(" SELECT  DISTINCT mobile_no,cadre FROM `tbl_sentandreceivedsms` WHERE cadre !='Cleaner'");
        // $query = $this->db->query(" SELECT * FROM `tbl_cadre` ");

        foreach ($query->result_array() as $row)
        {
                // $mno->mobile_no;
                $mobile_no = $row['mobile_no'];
                $mno = array('mobile_no' => $mobile_no);

                $items = array_merge($mno, $bm);
                print_r($items);
                // echo "string ".$mobile_no;

                
                $insert = $this->db->insert('tbl_logs_broadcast', $items);

                if ($insert) {
                    echo "Tuko ";
                }else{
                    echo "Zii";
                }
        }

    
    }
     function logREGs($SignUp) {  
       $data=json_encode($SignUp);
       $file = "application/libraries/fileREG.txt";
       $text = $data."\r\n";
       file_put_contents($file, $text, FILE_APPEND);
    }
    function logbSMS($bm) {  
       $data=json_encode($bm);
       $file = "application/libraries/fileBSMS.txt";
       $text = $data."\r\n";
       file_put_contents($file, $text, FILE_APPEND);
    }
    function logTxt($bm) {  
        $data=json_encode($bm);
       $file = "application/libraries/file.txt";
       $text = $data."\r\n";
       file_put_contents($file, $text, FILE_APPEND);    
    }

    //Android exposure report API
    function RptExp() {
        $current_time = date("Y-m-d H:i:s");
        $Rpt = array(
            'exposure_location' => $this->input->post('eloc'),
            'exposure_type' => $this->input->post('etype'),
            'purpose' => $this->input->post('purp'),
            'whenithapnd' => $this->input->post('whenithapnd'),
            'HivStatus' => $this->input->post('HivStatus'),
            'HbvStatus' => $this->input->post('HbvStatus'),
            'numberofexposures' => $this->input->post('expno'),
            'pepinit' => $this->input->post('pepinit'),
            'dateofexposure' => $this->input->post('dateexpd'),
            'device' => $this->input->post('device'),
            'deviceSafety' => $this->input->post('deviceSafety'),
            'deep' => $this->input->post('deep'),
            'dateofpepinit' => $this->input->post('datepep'),
            'date_exposed' => $current_time,
            'exposureresult' => $this->input->post('expresult'),
            'created_at' => $current_time,
            'mobile_no' => $this->input->post('phone_no')
        );
         // print_r($Rpt);   
        $this->logTxt($Rpt);   
        $this->data->RptExp($Rpt);
    }
      

    function checkHCW($data) {

        $fname = $data['f_name']; // please read the below note

        $phone_no = $data['mobile_no'];



        $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $phone_no))->num_rows();
        $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $phone_no))->result_array();

        if ($check_existence >= 1) {
            foreach ($getMOB as $value) {
                $mob_no = $value['mobile_no'];
                if ($mob_no == $phone_no || $mob_no != $phone_no) {
                    echo 'Oops , Client exists!';
                }

            }
        } else {
            //if ($mob_no !== $phone_no) {
            $insert = $this->db->insert('tbl_patientdetails', $data);

            if ($insert) {
                echo 'Welldone';
                //$this->response($data, 200);
            } else {
                echo 'Failed ';
                //$this->response(array('status' => 'fail', 502));
            }
        }

    }

    function syncREGandSMS() {
        
        $this->data->syncREGandSMS();
    }
    //Get max client IDs
    //Use this function to check if datasync is working

    function DWHmaxID() {
       
        
        $dwh_db = $this->load->database('post_C4C', TRUE);
        $c4c_db = $this->load->database('c4cDB', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        // $ulizaa = "select count(DISTINCT client_id) as client_id from tbl_smslogsArchived";
        $ulizaa = "select count(*) from tbl_exposures";
           // $ulizaa = "select * from tbl_exposures";


        $items =  $dwh_db->query($ulizaa)->result_array();

        $items = json_encode(array('result' => $items));
        // print_r($items);
        echo 'Clients exp '.$items;

    }



    function mhkSYS() {
        $this->data->mhkAlert();
    }

    function sample() {

        $ulizaa = "SELECT * from tbl_staffdetails order by created desc";


        $ulizas = "SELECT  
            tbl_staffdetails.id AS user_id,
            tbl_staffdetails.user_name AS user_name,
            tbl_staffdetails.user_mobile AS user_mobile,
            tbl_staffdetails.user_level AS user_level,
            tbl_county.`name` AS county,
            tbl_sub_county.`name` AS sub_county,
            tbl_master_facility.name AS facility,
            tbl_staffdetails.created AS created,
            tbl_staffdetails.status AS user_status 
            FROM
            tbl_staffdetails 
            INNER JOIN tbl_master_facility 
                ON tbl_master_facility.code = tbl_staffdetails.facility 
            INNER JOIN tbl_county 
                ON tbl_county.id = tbl_master_facility.county_id 
            INNER JOIN tbl_sub_county 
                ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID 
            WHERE user_level = 7 and  tbl_staffdetails.status='Active'";
                $uliza = "SELECT
            count(`c`.`id` )AS `client_id`,
            ( CASE WHEN ( `c`.`level` = 6 ) THEN 'complete' ELSE 'incomplete' END ) AS `reg_status`,
            COALESCE (
            ( CASE WHEN ( `c`.`partner_id` = '1' ) THEN 'UCSF' WHEN ( `c`.`partner_id` = '2' ) THEN 'Nascop' END ),
            'Not_Specified' 
            ) AS `Partner_old`,
            trim( `c`.`national_id` ) AS `national_id`,
            concat(
            ucase( substr( concat( trim( `c`.`f_name` ) ), 1, 1 ) ),
            lcase( substr( concat( trim( `c`.`f_name` ) ), 2 ) ) 
            ) AS `first_name`,
            concat(
            ucase( substr( concat( trim( `c`.`l_name` ) ), 1, 1 ) ),
            lcase( substr( concat( trim( `c`.`l_name` ) ), 2 ) ) 
            ) AS `last_name`,
            `c`.`mobile_no` AS `mobile_no`,
            COALESCE ( `c`.`DOB`, 'Empty' ) AS `dob`,
            timestampdiff( YEAR, makedate( `c`.`DOB`, 1 ), curdate( ) ) AS `age`,
            cast( `c`.`date_registered` AS date ) AS `enrollment_date`,
            COALESCE ( `ag`.`age_group`, 'Empty' ) AS `age_group`,
            COALESCE (
            concat(
            ucase( substr( concat( trim( `g`.`name` ) ), 1, 1 ) ),
            lcase( substr( concat( trim( `g`.`name` ) ), 2 ) ) 
            ),
            'Empty' 
            ) AS `gender`,
            COALESCE ( `cdr`.`name`, 'Empty' ) AS `cadre`,
            COALESCE ( `c`.`facility_id`, 'Empty' ) AS `mfl_no`,
            `c`.`date_registered` AS `date_registered`,
            COALESCE ( `h`.`name`, 'Empty' ) AS `hepatitsb_status`,
            COALESCE ( `k`.`name`, 'Empty' ) AS `sub_county`,
            COALESCE ( `t`.`name`, 'Empty' ) AS `county`,
            COALESCE ( `f`.`keph_level`, 'Empty' ) AS `facility_level`,
            COALESCE ( `f`.`name`, 'Empty' ) AS `facility`,
            COALESCE ( `inb`.`msg`, 'Empty' ) AS `receivedsms`,
            COALESCE ( `msgid`.`messages`, 'Empty' ) AS `sentsms`,
            COALESCE ( `msgcat`.`name`, 'Empty' ) AS `categ_name`,
            COALESCE ( `mod`.`name`, 'Empty' ) AS `source`,
                COALESCE ( `ptn`.`name`, 'Empty' ) AS `Partner`
        FROM
            (
                (
            (
            (
            (
            (
            (
            (
            (
            (
            (
                (
            (
            ( `tbl_patientdetails` `c` JOIN `tbl_gender` `g` ON ( ( `c`.`gender_id` = `g`.`id` ) ) )
            LEFT JOIN `tbl_cadre` `cdr` ON ( ( `c`.`cadre_id` = `cdr`.`id` ) ) 
            )
            LEFT JOIN `tbl_hepatitsb` `h` ON ( ( `c`.`hepatitis_b` = `h`.`id` ) ) 
            )
            LEFT JOIN `tbl_age_group` `ag` ON ( ( `c`.`age_group` = `ag`.`id` ) ) 
            )
            LEFT JOIN `tbl_master_facility` `f` ON ( ( `c`.`facility_id` = `f`.`code` ) ) 
            )
            LEFT JOIN `tbl_county` `t` ON ( ( `f`.`county_id` = `t`.`id` ) ) 
            )
            LEFT JOIN `tbl_sub_county` `k` ON ( ( `f`.`Sub_County_ID` = `k`.`id` ) ) 
            )
            LEFT JOIN `tbl_logs_inbox` `inb` ON ( ( `inb`.`mobile_no` = `c`.`mobile_no` ) ) 
            )
            LEFT JOIN `tbl_logs_outbox` `outb` ON ( ( `outb`.`mobile_no` = `c`.`mobile_no` ) ) 
            )
            LEFT JOIN `tbl_messages` `msgid` ON ( ( `msgid`.`id` = `outb`.`message_id` ) ) 
            )
            LEFT JOIN `tbl_category` `msgcat` ON ( ( `msgcat`.`id` = `msgid`.`category_id` ) ) 
            )
            LEFT JOIN `tbl_registration_mode` `mod` ON ( ( `mod`.`id` = `c`.`registrationmode` ) ) 
            )
                LEFT JOIN `tbl_PartnerClients` `ptnc` ON ( ( `ptnc`.`hcwID` = `c`.`id` ) ) 
            )
                LEFT JOIN `tbl_partners` `ptn` ON ( ( `ptn`.`id` = `ptnc`.`id` ) ) 
            )";


        $ulizaa = "SELECT * from tbl_stafffdetails";
        $items = $this->db->query($ulizaa)->result_array();

        $items = json_encode(array('result' => $items));
        echo $items;
    }

    function create(){

        $items=(base64_decode("MjY2NjgqMTQvMDEvMTk4MSoxKmNhZHJlIGRpZmZlcmVudCpHYXRlZ2kgSGVhbHRoIENlbnRyZSot MSotMSoxKjIqNSo="));

        $array = explode("*", $items);
        // $array = $a_explode[0];
        // print_r($array);       
        // $contnt = "10+2+7+4+8+6";
       // $array = explode("+", $contnt);
         foreach ($array as $key => $value) {

           echo "{$key} => {$value} </br>";
           // echo "{$key} ";
           // echo "{$value} ";
           // echo $value;


                                switch ($value) {
                                    case 8:
                                        // echo "Nane </br>";
                                        break; 
                                        case 7:
                                        // echo "Saba </br>";
                                        break;   
                                         default:
                                        break;
                                }         
                            }
    }

  function here(){   

    // $arrayName = array('' => , );
    // echo "Hello";

    $hcw_id = 660;

       $contnt = "prmmeter1*prm2*parameter 3*prm4*prm5*prm6*prm7*item8*prm9*prm10*prm11*prm12*prm13*prm14*prm15*prm16*prm17*prm18*prm19*prm20";
             
            $andrd_APP = explode("*", $contnt); 
            $AddImn = array('client_id' =>
            $hcw_id,'hbv' => $andrd_APP[0],'hbv' => $andrd_APP[1],'hbvdose1'
            => $andrd_APP[2],'hbvdose2' => $andrd_APP[3],'influenza' =>
            $andrd_APP[4],'influenzadose' => $andrd_APP[5],'varcella' =>
            $andrd_APP[6],'historyofdisease' => $andrd_APP[7],'varcelladose1'
            => $andrd_APP[8],'varcelladose2' => $andrd_APP[9],'tdap' =>
            $andrd_APP[10],'booster' => $andrd_APP[11],'tdapdose' =>
            $andrd_APP[12],'boosterdose' => $andrd_APP[13],'measles' =>
            $andrd_APP[14],'measlesdose1' => $andrd_APP[15],'measlesdose2' =>
            $andrd_APP[16],'meningoc' => $andrd_APP[17],'meningocdose1' =>
            $andrd_APP[18],'meningocdose2' => $andrd_APP[19]);

                        print_r($AddImn); 
                        // exit;                     

                         $this->savecalndr($AddImn);
  }
  function savecalndr($AddImn){

    $insert = $this->db->insert('tbl_calendar', $AddImn);
    if ($insert) {
        echo "Success";
    }
  }



    //runs every minute 
    function index() {
        $this->data->receiver_processor();
    }

    //Android App api unused
    function get_counties() {
        $returned_value = $this->data->getCounty();
        if (!empty($returned_value)) {
            $items = json_encode($returned_value);
            echo $items;
        } else {
            
            echo "Error Occured";
        }
    }

    //Android App API gets county,  sub-county and facility
    function getPartner() {
        $returned_value = $this->data->getPartners();
        if (empty($returned_value)) {
            $items = json_encode($returned_value);
            echo $items;
        } else {
            $items = json_encode(array('partners' => $returned_value));
            echo $items;
        }
    }

    function broadcast() {
        $this->data->broadcast();
    }

   

    function FetchSms() {

        $from = $_POST['from'];
        $to = $_POST['to'];
        $text = $_POST['text'];
        $date = $_POST['date'];
        $id = $_POST['id'];
        $linkId = $_POST['linkId']; //This works for onDemand subscription products      



        $this->data->Sms($from, $to, $text, $date, $id, $linkId);

       
    }

    function task() {
       
                $ch = curl_init();

                // curl_setopt($ch, CURLOPT_URL, "http://c4c-test.localhost/index.php/core");
                //$LastInsertId
                curl_setopt($ch, CURLOPT_URL, "http://41.220.229.138/KAPS/index.php/Survey/");
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, 0);

                curl_exec($ch);

                curl_close($ch);
                
    }

    function BroadcastSender() {
        $this->data->broadcast_sender();
    }

    function get() {
        $this->data->getDataAndUpdate();
    }

    function age_group() {
        $this->data->age_group();
    }

    function auto_broadcast() {
        
        $this->data->automated_broadcast();


         //Runs Kaps Survey broadcast

        // $this->task();
    }


    //runs every minute-handles adherence messages
    function adhere() {
        $this->data->adherence();
    }

    function sender() {
        $this->data->sender();
    }

    function responses() {
        $this->data->responses_to_adherence();
    }

    //runs every 5 mins handles confirmatory message no.6 
    function confirm() {
        // $this->data->confirmatory_message();
    }



    //Text supervisor to respond to check-in request by a student
    function TextSup() {
        $this->data->TextSuperVisor();
    }

    //Broadcast to health workrs uploaded through csv-custom function
    function SheetB() {
        $this->data->BroadcastSheet();
    }

    //AfyaPoa links
    function RegisterClient() {
        //         $default_level = 3;
        $dateTime = date("Y-m-d h:i:s");

        $RegClient = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'id_number' => $this->input->post('id_number'),
            'phone_no' => $this->input->post('phone_no'),
            'gender_id' => $this->input->post('gender_id'),
            'sub_county_id' => $this->input->post('sub_county_id'),
            'marital_status_id' => $this->input->post('marital_status_id'),
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'deleted' => "Nope",
            'NHIF_no' => $this->input->post('NHIF_no'),
            'KRA-Pin' => $this->input->post('KRA-Pin'),
            'occupation_id ' => $this->input->post('occupation_id'),
            'date_registered' => $dateTime,
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'insurance_policy_id' => $this->input->post('insurance_policy_id'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        //        $this->RegApp($data);
        $this->data->RegClnt($RegClient);
    }

    

}

