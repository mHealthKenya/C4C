<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends MY_Controller {

    public $data = '';
    public $county = '';
    public $users = '';
    public $clinic = '';
    public $blood_group = '';
    public $upload_csv = '';
    public $stockusers = '';
    public $deferral = '';
    public $facility = '';
    public $partner = '';
    public $module = '';
    public $lab = '';

    function cryptPass($input, $rounds = 9) {
        $salt = "";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++):
            $salt .= $saltChars[array_rand($saltChars)];
        endfor;
        return crypt($input, sprintf("$2y$%02d$", $rounds) . $salt);
    }

    function passcry() {
        $n = $this->db->query("SELECT id, password from tbl_staffdetails")->result();
        foreach ($n as $na) {
            $pass = $na->password;
            $id = $na->id;



            $newpass = $this->cryptPass($pass);

            echo $id . " -> " . $pass . " ->" . $newpass . '<br>';


            $this->db->query("UPDATE tbl_staffdetails SET password = '$newpass' WHERE id = '$id'");
        }
    }

    function __construct() {
        parent::__construct();

        $this->load->model('Facility_model');

        $this->check_access();
        $this->data = new DBCentral();
        $this->load->model('DBCentral', 'mymodel');
        $this->users = new User_model();

        // load Pagination library
        $this->load->library('pagination');
    }

    function check_access() {
        $logged_in = $this->session->userdata("logged_in");

        if ($logged_in) {
            // echo "success";
        } else {



            redirect("Login", "refresh");
        }
    }

    function login() {
        $view = 'Login';
        $this->load->view($view);
    }

    function Rgender() {
        $this->load->view('home', $data);
    }

    function Rfacility() {
        $this->load->view('FacilityLevel', $data);
    }

    function pepcascade() {
        $this->load->view('cascade', $data);
    }
    public function allclients() {
        $config = array();
        $config["base_url"] = base_url() . "home/allclients";
        $config["total_rows"] = $this->data->get_total();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        // $choice = $config["total_rows"] / $config["per_page"];
        // $config["num_links"] = round($choice);

        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
 
        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
  $config['first_tag_close'] = '</li>';
 
  $config['last_link'] = 'Last »';
  $config['last_tag_open'] = '<li class="next page">';
  $config['last_tag_close'] = '</li>';
 
  $config['next_link'] = 'Next →';
  $config['next_tag_open'] = '<li class="next page">';
  $config['next_tag_close'] = '</li>';
 
  $config['prev_link'] = '← Previous';
  $config['prev_tag_open'] = '<li class="prev page">';
  $config['prev_tag_close'] = '</li>';
 
  $config['cur_tag_open'] = '<li class="active"><a href="">';
  $config['cur_tag_close'] = '</a></li>';
 
  $config['num_tag_open'] = '<li class="page">';
  $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->data->fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data["counties"] = $this->data->getCounty();
        $data["facility"] = $this->data->getFacilities();
        $data["partner"] = $this->data->getpartner();
        // $third_uri = $this->uri->segment(3);
           
        $this->load->view("rawdatas", $data);
    }


    function info() {
        $wdata["allclients"] = $this->data->getAllClients();
        $wdata["counties"] = $this->data->getCounty();
        $third_uri = $this->uri->segment(3);
        //$data["allreports"] = $allclients;            

        $this->load->view('clients_raw', $wdata);
        // echo json_encode($allclients);
    }

    function rawExposures() {
        $wdata["allexposed"] = $this->data->getallexpo();
        $wdata["counties"] = $this->data->getCounty();
        $wdata["facility"] = $this->data->getFacilities();
        $wdata["partner"] = $this->data->getpartner();
        $third_uri = $this->uri->segment(3);
        //$data["allclients"] = $allclients;            

        $this->load->view('expo_raw');
        // echo json_encode($allclients);
    }

    function filter_exposed() {
        $data["counties"] = $this->data->getCounty();
        $data["facility"] = $this->data->getFacilities();
        $data["partner"] = $this->data->getpartner();
        $county = $this->input->post('county', TRUE);
        //$data["county"] =$this->input->post('county', TRUE);
        $data["county"] =$this->input->post('county', TRUE);
        $date_from = $this->input->post('from_date', TRUE);
        $date_to = $this->input->post('to_date', TRUE);
        $data["allexposed"] = $this->mymodel->get_exp($county, $date_from, $date_to);
        // $data = json_encode($hcws);
        $this->load->view('expo_raw', $data, $county);
    }

    function filter_registrations() {
        $data["counties"] = $this->data->getCounty();
        $data["facility"] = $this->data->getFacilities();
        $data["partner"] = $this->data->getpartner();
        $county = $this->input->post('county', TRUE);
        //$facility = $_SESSION['facility_id'];
        $data["county"] =$this->input->post('county', TRUE);
        $date_from = $this->input->post('from_date', TRUE);
        $date_to = $this->input->post('to_date', TRUE);
        $data["allclients"] = $this->mymodel->get_mydata($county, $date_from, $date_to);

        // echo json_encode($facility);
        // exit;

         $this->load->view('clients_raw', $data, $county);
    }


    


    function sentsms() {
        $data["counties"] = $this->data->getCounty();
        $county = $this->input->post('county', TRUE);
        //$data["county"] =$this->input->post('county', TRUE);
        $date_from = $this->input->post('from_date', TRUE);
        $date_to = $this->input->post('to_date', TRUE);
        $data["allexpo"] = $this->mymodel->get_sms($county, $date_from, $date_to);
        // $data = json_encode($hcws);
        $this->load->view('sentmsgs', $data, $county);
    }

    function cascadetbl() {
        $wdata["cas"] = $this->data->getCascade();
        $wdata["counties"] = $this->data->getCounty();
        $third_uri = $this->uri->segment(3);
        //$data["allclients"] = $allclients;            

        $this->load->view('cascadetbl', $wdata);
        // echo json_encode($allclients);
    }
    function filterCascade() {
        $data["counties"] = $this->data->getCounty();
        $county = $this->input->post('county', TRUE);
        //$data["county"] =$this->input->post('county', TRUE);
        $date_from = $this->input->post('from_date', TRUE);
        $date_to = $this->input->post('to_date', TRUE);
        $data["cas"] = $this->mymodel->get_myCascade($county, $date_from, $date_to);
        // $data = json_encode($hcws);
        $this->load->view('cascadetbl', $data, $county);
    }

//     function index() {
//         $checkin = $this->data->CheckedInStudentsCount();
//         $ctyid = $_SESSION['county_id'];
//         $sbctyid = $_SESSION['sub_county_id'];
//         $userlevel = $_SESSION['user_level'];
//         $ftyid = $_SESSION['facility_id'];
//         $partner_id = $_SESSION['partner_id'];

//         if ($partner_id == 4) {
//             if (empty($third_uri) && $third_uri !== "json") {
//                 $data["checkin"] = $checkin;
//                 $data['hcw'] = $this->mymodel->reg_supervisors();
//                 $data['exposures'] = $this->mymodel->CheckedInStudentsCount();
//                 $this->load->view('checkin_dashboard', $data);
//             } else {
//                 echo json_encode($checkin);
//             }
//         } else if ($partner_id == 5) {
//             if (empty($third_uri) && $third_uri !== "json") {
//                 $data["checkin"] = $checkin;
//                 $data['hcw'] = $this->mymodel->PractionersCount();
//                 $data['exposures'] = $this->mymodel->KmpdubexpCount();
//                 $this->load->view('kmpdu_dashboard', $data);
//             } else {
//                 echo json_encode($checkin);
//             }
//         }
//         // else if ($userlevel == 6 || $userlevel == 0) {
//         //     // if (empty($third_uri) && $third_uri !== "json") {
//         //     //     $data["checkin"] = $checkin;
//         //     //     $this->load->view('broadcastsms', $data);
//         //     // } else {
//         //     //     echo json_encode($checkin);
//         //     // }
//         //      $this->load->view('broadcastsms', $data);
//         // } 
//         else if ($userlevel == 6) {
// //            if (empty($third_uri) && $third_uri !== "json") {
// //                $data["checkin"] = $checkin;
// //
// //                $this->load->view('home', $data);
// //            } else {
// //                echo json_encode($checkin);
// //            } 
//             // $this->load->view('hcw_dashboard', $data);
//             $this->load->view('home');
//         } else {

//             $third_uri = $this->uri->segment(3);
//             if (empty($third_uri) && $third_uri !== "json") {
//                 // $data["checkin"] = $checkin;
//                 $data['hcw'] = $this->mymodel->get_registered_hcw($ctyid, $sbctyid, $userlevel, $ftyid, $partner_id);
//                 $data['exposures'] = $this->mymodel->get_number_of_exposures($ctyid, $sbctyid, $userlevel, $ftyid);

//                 // $this->load->view('hcw_dashboard', $data);
//                 $this->load->view('home', $data);
//             } else {
//                 echo json_encode($data);
//             }
//         }
//     }


    function index() {
        $this->load->view('home');
    }
    function upload() {
        $PartnerHcw = $this->data->PartnerHcw();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["PartnerHcw"] = $PartnerHcw;
            $this->load->view('uploadhcw', $data);
        } else {
            echo json_encode($PartnerHcw);
        }
    }

    function change_pass() {

        $confirm = $this->input->post('new_password');

        echo "password" . $confirm . '<br>';

        $id = $this->uri->segment(3);
        $pass = $this->users->change_pass($id, $confirm);
        if ($pass) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function trends() {
        if ($_SESSION['user_level'] == 1 || $_SESSION['user_level'] == 2) {
            $arr1 = $this->db->query("SELECT 
  DATE_FORMAT(
    tbl_patientdetails.date_registered,
    '%b %y'
  ) AS date,
  COUNT(tbl_patientdetails.id) AS registered,
  COALESCE(
    (SELECT 
      COUNT(tbl_reports.id) 
    FROM
      tbl_reports 
    WHERE DATE_FORMAT(
        tbl_reports.date_exposed,
        '%b %y'
      ) = DATE_FORMAT(
        tbl_patientdetails.date_registered,
        '%b %y'
      ) 
    GROUP BY tbl_patientdetails.date_registered),
    0
  ) AS reported 
FROM
  tbl_patientdetails 
  LEFT OUTER JOIN tbl_reports ON tbl_reports.p_details_id = tbl_patientdetails.id
WHERE tbl_patientdetails.age_group <> 0 AND tbl_patientdetails.gender_id IS NOT NULL
AND tbl_patientdetails.cadre_id IS NOT NULL AND tbl_patientdetails.facility_id IS NOT NULL
GROUP BY date 
ORDER BY tbl_patientdetails.date_registered ASC ")->result_array();

            $arr2 = $this->db->query("SELECT 
  DATE_FORMAT(
    tbl_reports.date_exposed,
    '%b %y'
  ) AS date,
  COALESCE(
    (SELECT 
      COUNT(tbl_patientdetails.id) 
    FROM
      tbl_patientdetails 
    WHERE tbl_patientdetails.age_group <> 0 AND tbl_patientdetails.gender_id IS NOT NULL
AND tbl_patientdetails.cadre_id IS NOT NULL AND tbl_patientdetails.facility_id IS NOT NULL
      AND DATE_FORMAT(
        tbl_patientdetails.date_registered,
        '%b %y'
      ) = DATE_FORMAT(
        tbl_reports.date_exposed,
        '%b %y'
      ) 
    GROUP BY tbl_reports.date_exposed),
    0
  ) AS registered,
  COUNT(tbl_reports.id) AS reported 
FROM
  tbl_reports 
  LEFT OUTER JOIN tbl_patientdetails 
    ON tbl_patientdetails.id = tbl_reports.p_details_id 
    GROUP BY date
    ORDER BY tbl_patientdetails.date_registered ASC")->result_array();
        }

        if ($_SESSION['user_level'] == 3) {
            $c = $_SESSION['county_id'];
            $arr1 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_registered, '%b %y') AS date,
  COUNT(a.id) AS registered,
  COALESCE(
    (SELECT 
      COUNT(tbl_reports.id) 
    FROM
      tbl_reports 
      INNER JOIN tbl_patientdetails AS b 
        ON b.id = tbl_reports.p_details_id 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = b.facility_id 
    WHERE DATE_FORMAT(
        tbl_reports.date_exposed,
        '%b %y'
      ) = DATE_FORMAT(a.date_registered, '%b %y') 
      AND tbl_master_facility.county_id = '$c'
    GROUP BY a.date_registered),
    0
  ) AS reported 
FROM
  tbl_patientdetails AS a 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = a.facility_id 
WHERE  a.age_group <> 0 AND a.gender_id IS NOT NULL
AND a.cadre_id IS NOT NULL AND a.facility_id IS NOT NULL AND c.county_id = '$c'
GROUP BY date 
ORDER BY a.date_registered ASC ")->result_array();

            $arr2 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_exposed, '%b %y') AS date,
  COALESCE(
    (SELECT 
      COUNT(tbl_patientdetails.id) 
    FROM
      tbl_patientdetails 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = tbl_patientdetails.facility_id 
    WHERE tbl_master_facility.county_id = '$c' AND
        tbl_patientdetails.age_group <> 0 AND tbl_patientdetails.gender_id IS NOT NULL
AND tbl_patientdetails.cadre_id IS NOT NULL AND tbl_patientdetails.facility_id IS NOT NULL
      AND DATE_FORMAT(
        tbl_patientdetails.date_registered,
        '%b %y'
      ) = DATE_FORMAT(a.date_exposed, '%b %y') 
    GROUP BY a.date_exposed),
    0
  ) AS registered,
  COUNT(a.id) AS reported 
FROM
  tbl_reports AS a 
 LEFT OUTER JOIN tbl_patientdetails AS b 
    ON b.id = a.p_details_id 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = b.facility_id 
WHERE c.Sub_County_ID = '$c'
  GROUP BY date
    ORDER BY b.date_registered ASC")->result_array();
        }
        if ($_SESSION['user_level'] == 4) {
            $c = $_SESSION['sub_county_id'];
            $arr1 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_registered, '%b %y') AS date,
  COUNT(a.id) AS registered,
  COALESCE(
    (SELECT 
      COUNT(tbl_reports.id) 
    FROM
      tbl_reports
      INNER JOIN tbl_patientdetails AS b 
        ON b.id = tbl_reports.p_details_id 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = b.facility_id 
    WHERE DATE_FORMAT(
        tbl_reports.date_exposed,
        '%b %y'
      ) = DATE_FORMAT(a.date_registered, '%b %y') 
      AND tbl_master_facility.Sub_County_ID = '$c'
    GROUP BY a.date_registered),
    0
  ) AS reported 
FROM
  tbl_patientdetails AS a 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = a.facility_id 
WHERE a.age_group <> 0 AND a.gender_id IS NOT NULL
AND a.cadre_id IS NOT NULL AND a.facility_id IS NOT NULL AND  c.Sub_County_ID = '$c'
GROUP BY date 
ORDER BY a.date_registered ASC ")->result_array();

            $arr2 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_exposed, '%b %y') AS date,
  COALESCE(
    (SELECT 
      COUNT(tbl_patientdetails.id) 
    FROM
      tbl_patientdetails 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = tbl_patientdetails.facility_id 
    WHERE tbl_master_facility.Sub_County_ID = '$c' AND
        tbl_patientdetails.age_group <> 0 AND tbl_patientdetails.gender_id IS NOT NULL
AND tbl_patientdetails.cadre_id IS NOT NULL AND tbl_patientdetails.facility_id IS NOT NULL
      AND DATE_FORMAT(
        tbl_patientdetails.date_registered,
        '%b %y'
      ) = DATE_FORMAT(a.date_exposed, '%b %y') 
    GROUP BY a.date_exposed),
    0
  ) AS registered,
  COUNT(a.id) AS reported 
FROM
  tbl_reports AS a 
 LEFT OUTER JOIN tbl_patientdetails AS b 
    ON b.id = a.p_details_id 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = b.facility_id 
WHERE c.Sub_County_ID = '$c'
  GROUP BY date
    ORDER BY b.date_registered ASC ")->result_array();
        }
        if ($_SESSION['user_level'] == 5) {
            $c = $_SESSION['facility_id'];
            $arr1 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_registered, '%b %y') AS date,
  COUNT(a.id) AS registered,
  COALESCE(
    (SELECT 
      COUNT(tbl_reports.id) 
    FROM
      tbl_reports
      INNER JOIN tbl_patientdetails AS b 
        ON b.id = tbl_reports.p_details_id 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = b.facility_id 
    WHERE DATE_FORMAT(
        tbl_reports.date_exposed,
        '%b %y'
      ) = DATE_FORMAT(a.date_registered, '%b %y') 
      AND tbl_master_facility.code = '$c'
    GROUP BY a.date_registered),
    0
  ) AS reported 
FROM
  tbl_patientdetails AS a 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = a.facility_id 
WHERE a.age_group <> 0 AND a.gender_id IS NOT NULL
AND a.cadre_id IS NOT NULL AND a.facility_id IS NOT NULL AND  c.code = '$c'
GROUP BY date 
ORDER BY a.date_registered ASC ")->result_array();

            $arr2 = $this->db->query("SELECT 
  DATE_FORMAT(a.date_exposed, '%b %y') AS date,
  COALESCE(
    (SELECT 
      COUNT(tbl_patientdetails.id) 
    FROM
      tbl_patientdetails 
      INNER JOIN tbl_master_facility 
        ON tbl_master_facility.code = tbl_patientdetails.facility_id 
    WHERE tbl_master_facility.code = '$c' AND
        tbl_patientdetails.age_group <> 0 AND tbl_patientdetails.gender_id IS NOT NULL
AND tbl_patientdetails.cadre_id IS NOT NULL AND tbl_patientdetails.facility_id IS NOT NULL
      AND DATE_FORMAT(
        tbl_patientdetails.date_registered,
        '%b %y'
      ) = DATE_FORMAT(a.date_exposed, '%b %y') 
    GROUP BY a.date_exposed),
    0
  ) AS registered,
  COUNT(a.id) AS reported 
FROM
  tbl_reports AS a 
 LEFT OUTER JOIN tbl_patientdetails AS b 
    ON b.id = a.p_details_id 
  INNER JOIN tbl_master_facility AS c 
    ON c.code = b.facility_id 
WHERE c.code= '$c'
  GROUP BY date
    ORDER BY b.date_registered ASC ")->result_array();
        }
        $ted = array_unique(array_merge($arr1, $arr2), SORT_REGULAR);

        $final_array = array();
        $final = array();
        $registered_count = 0;

        foreach ($ted as $teddy) {
            $registered_count += $teddy['registered'];
            $final['date'] = $teddy['date'];
            $final['registered'] = $registered_count;
            $final['reported'] = $teddy['reported'];
            $final['rate'] = round(($teddy['reported'] / $registered_count) * 100, 1);

            array_push($final_array, $final);
        }

        $reversed = array_reverse($final_array);
        echo json_encode($final_array);
    }

    


    
    function studs() {
        $ctyid = $_SESSION['county_id'];
        $sbctyid = $_SESSION['sub_county_id'];
        $userlevel = $_SESSION['user_level'];
        $ftyid = $_SESSION['facility_id'];
        $partner_id = $_SESSION['partner_id'];
        $checkin = $this->data->uonstuds();
        $third_uri = $this->uri->segment(3);

        if (empty($third_uri) && $third_uri !== "json") {
            $data["checkin"] = $checkin;
            $this->load->view('uonstuds', $data);
        } else {
            echo json_encode($checkin);
        }
    }
    

    function submitBroadcastsms() {

        $cdre = $this->input->post('cadrev');
        $cty = $this->input->post('ctyv');
        $sbcty = $this->input->post('sbctyv');
        $fty = $this->input->post('ftyv');
        $bdate = $this->input->post('bdatev');
        $sms = $this->input->post('smsv');
        $bname = $this->input->post('bnamev');
        $uid = $this->input->post('uidv');
        $cid = $this->input->post('cidv');
        $sbctyid = $this->input->post('sbctyidv');
        $ulvl = $this->input->post('ulvlv');
        $myctyid = "";
        $mysbctyid = "";
        $myfid = "";
        $mycdre = "";


        $qry_ctyid = "select * from tbl_county where name=? limit 1";
        $params_cty = array($cty);
        $res = $this->db->query($qry_ctyid, $params_cty);
        foreach ($res->result() as $c) {
            $myctyid = $c->id;
        }

        $qry_sbctyid = "select * from tbl_sub_county where name=? limit 1";
        $params_sbcty = array($sbcty);
        $ressb = $this->db->query($qry_sbctyid, $params_sbcty);
        foreach ($ressb->result() as $csb) {
            $mysbctyid = $csb->id;
        }

        $qry_cdid = "select * from tbl_cadre where name=? limit 1";
        $params_cd = array($cdre);
        $rescd = $this->db->query($qry_cdid, $params_cd);
        foreach ($rescd->result() as $ccd) {
            $mycdre = $ccd->id;
        }


        $qry_fctyid = "select * from tbl_master_facility where name=? limit 1";
        $params_fcty = array($fty);
        $resf = $this->db->query($qry_fctyid, $params_fcty);
        foreach ($resf->result() as $fc) {
            $myfid = $fc->code;
        }


        $qry = "insert into tbl_sms_broadcast(user_id,user_level,county_id,sub_county_id,facility_id,cadre_id,sms_datetime,msg,broadcastname) values(?,?,?,?,?,?,?,?,?)";
        $params = array($uid, $ulvl, $myctyid, $mysbctyid, $myfid, $mycdre, $bdate, $sms, $bname);
        $this->db->query($qry, $params);
        echo json_encode("success data");
    }

    function broadcastsms() {
        $broadcast = $this->data->broadcasts();
        $county = $this->data->countylist();
        $cadre = $this->data->getcadre();
        $g_subcounty = $this->data->getSubcounty();
        $g_facility = $this->data->getfacility();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["broadcast"] = $broadcast;
            $data["counties"] = $county;
            $data["subcounty"] = $g_subcounty;
            $data["facility"] = $g_facility;
            $data["cadre"] = $cadre;

            $this->load->view('broadcastsms', $data);
        } else {
            echo json_encode($broadcast);
        }
    }

     function create_new_broadcast() {

        $cdre = $this->input->post('cadrev');
        $cty = $this->input->post('ctyv');
        $sbcty = $this->input->post('sbctyv');
        $fty = $this->input->post('ftyv');
        $bdate = $this->input->post('bdatev');
        $sms = $this->input->post('smsv');
        $bname = $this->input->post('bnamev');
        $uid = $this->input->post('uidv');
        $cid = $this->input->post('cidv');
        $sbctyid = $this->input->post('sbctyidv');
        $ulvl = $this->input->post('ulvlv');

        $items = [
            $cdre = $this->input->post()
        ];
//        print_r($items);
        //  Scan through outer loop

        foreach ($items as $simu) {
            foreach ($simu as $inde => $values) {
//                print_r($simu['bnamev']);
//                echo "$inde $values\n";
                foreach ($values as $index => $vitu) {
//                    echo "$inde $vitu\n";
                    switch ($inde) {
                        case 'cadrev':

                            $query = $this->db
                                    ->select('name,id')
                                    ->where("name", $vitu)
                                    ->get('tbl_cadre');

                            foreach ($query->result_array() as $row) {
                                $cdr_name[] = $row['name'];
                                $cdr_id[] = $row['id'];
                                $cdrid = $row['id'];
                                $id = json_encode($cdr_id);

//                                echo "$cdrid $vitu\n";
                            }
                            break;
                        case 'ctyv':
                            $query = $this->db
                                    ->select('county_name,county_id')
                                    ->where("county_name", $vitu)
                                    ->group_by("county_id")
                                    ->get('tbl_master_facility');

                            foreach ($query->result_array() as $row) {
                                $c_name[] = $row['county_name'];
                                $c_id[] = $row['county_id'];
                                $cid = $row['county_id'];
                                $id = json_encode($cid);

//                                echo "$subid $vitu\n";
                            }
                            break;
                        case 'sbctyv':

                            $query = $this->db
                                    ->select('Sub_County_Name,Sub_County_ID')
                                    ->where("Sub_County_Name", $vitu)
                                    ->group_by("Sub_County_ID")
                                    ->get('tbl_master_facility');

                            foreach ($query->result_array() as $row) {
                                $sub_name[] = $row['Sub_County_Name'];
                                $sub_id[] = $row['Sub_County_ID'];
                                $subid = $row['Sub_County_ID'];
                                $id = json_encode($sub_id);

//                                echo "$subid $vitu\n";
                            }
                            break;
                        case 'ftyv':
                            $query = $this->db
                                    ->select('name,code')
                                    ->where("name", $vitu)
                                    ->get('tbl_master_facility');

                            foreach ($query->result_array() as $row) {
                                $mfl_name[] = $row['name'];
                                $mfl_id[] = $row['code'];
                                $mflid = $row['id'];
                                $id = json_encode($mflid);

//                                echo "$subid $vitu\n";
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
//            print_r($simu['bnamev']);
//            $str = implode("*", $sub_id);
//            $subname = implode("*", $sub_name);
            $rexpose = array(
                'cadre_id' => implode("+", $cdr_id),
                'county_id' => implode("+", $c_id),
                'sub_county_id' => implode("+", $sub_id),
                'facility_id' => implode("+", $mfl_id),
                'broadcastname' => $simu['bnamev'],
                'msg' => $simu['smsv'],
            );
            $this->db->insert('tbl_sms_broadcast', $rexpose);
        }
    }

    function getmysubcounties() {
        // $myarr=[];
        $myarr = array();
        $scounty = $this->input->post('county');
        foreach ($scounty as $key => $value) {
//            print_r($value);
//        $value='Embu';

            $query = $this->db
                    ->select('*')
                    ->where("county_name", $value)
                    ->group_by("Sub_County_ID")
                    ->get('tbl_master_facility');

            foreach ($query->result() as $row) {
                $sub_name = $row->Sub_County_Name;
                $sub_id = $row->county_id;
                array_push($myarr, $sub_name);
            }
        }
        echo json_encode($myarr);
    }

    function getmyfacilities() {
        // $myarr=[];
        $myarr = array();
        $scounty = $this->input->post('sub_county');
//        print_r($scounty);

        foreach ($scounty as $key => $value) {
//            print_r($value);
//        $value='Embu';

            $query = $this->db
                    ->select('*')
                    ->where("Sub_County_Name", $value)
                    ->get('tbl_master_facility');

            foreach ($query->result() as $row) {
                $mfl_name = $row->name;
//                $sub_id = $row->Sub_County_ID;
                array_push($myarr, $mfl_name);
            }
        }
        echo json_encode($myarr);
    }

    function getmyfacilitie() {
        $county = $this->input->post('sub_county');
        // $county="Tana River";
        $myarr = array();


        $qry = "Select * from tbl_sub_county where name=?";
        $params = array($county);
        $res = $this->db->query($qry, $params);
        foreach ($res->result() as $x) {

            $id = $x->id;
            $qry1 = "Select * from tbl_master_facility where Sub_County_ID=? group by name";
            $params1 = array($id);
            $res1 = $this->db->query($qry1, $params1);
            foreach ($res1->result() as $x1) {

                $name = $x1->name;
                array_push($myarr, $name);
            }
        }
        echo json_encode($myarr);
    }

    
    function adherence_level_count() {

        $ted = $this->db->query("SELECT tbl_adherence.id, COUNT(tbl_reports.id) AS count FROM tbl_adherence INNER JOIN tbl_reports ON tbl_reports.adherence_level = tbl_adherence.id GROUP BY tbl_adherence.id")->result_array();

        foreach ($ted as $value) {
            $id = $value['id'];
            $count = $value['count'];

            $this->db->query("UPDATE tbl_adherence set p_count = $count where id = $id");
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

    /*     * ***************Filter Fns ******* */

    function get_counties() {
        $get_counties = $this->db->query("Select tbl_county.id as county_id, tbl_county.name as county_name from tbl_county
                inner join tbl_master_facility ON tbl_master_facility.county_id = tbl_county.id
                inner join tbl_patientdetails ON tbl_patientdetails.facility_id = tbl_master_facility.code group by tbl_county.id")->result();
        echo json_encode($get_counties);
    }

    function get_sex() {
        $get_sex = $this->db->query("SELECT name as sex from tbl_gender")->result_array();
        echo json_encode($get_sex);
    }

    function get_level() {
        $get_level = $this->db->query("SELECT tbl_master_facility.keph_level AS level FROM tbl_master_facility INNER JOIN tbl_patientdetails ON tbl_patientdetails.facility_id
= tbl_master_facility.code GROUP BY tbl_master_facility.keph_level")->result_array();
        echo json_encode($get_level);
    }

    function get_age_group() {
        $get_level = $this->db->query("SELECT DISTINCT tbl_age_group.id as age_group_id, tbl_age_group.age_group AS age_group FROM tbl_age_group
 INNER JOIN tbl_patientdetails ON tbl_patientdetails.age_group = tbl_age_group.id inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.facility_id
where tbl_patientdetails.age_group is not NULL order by tbl_age_group.id ASC")->result_array();
        echo json_encode($get_level);
    }

    function get_cadre() {
        $get_cadre = $this->db->query("SELECT DISTINCT tbl_cadre.id AS cadre_id, tbl_cadre.name AS cadre FROM tbl_cadre INNER JOIN tbl_patientdetails
ON tbl_patientdetails.cadre_id = tbl_cadre.id INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id")->result_array();
        echo json_encode($get_cadre);
    }

    function get_sub_counties() {
        $county_id = urldecode($this->uri->segment(3));

        $get_partners = $this->db->query("Select tbl_sub_county.name as sub_county_name , tbl_sub_county.id as sub_county_id from
tbl_sub_county inner join tbl_master_facility ON tbl_master_facility.Sub_County_ID = tbl_sub_county.id
inner join tbl_patientdetails on tbl_patientdetails.facility_id= tbl_master_facility.code where tbl_master_facility.county_id ='$county_id' group by tbl_sub_county.id")->result();
        echo json_encode($get_partners);
    }

    function get_sub_counties_only() {
        $county_id = $_SESSION['county_id'];

        $get_partners = $this->db->query("Select tbl_sub_county.name as sub_county_name , tbl_sub_county.id as sub_county_id from
tbl_sub_county inner join tbl_master_facility ON tbl_master_facility.Sub_County_ID = tbl_sub_county.id
inner join tbl_patientdetails on tbl_patientdetails.facility_id= tbl_master_facility.code where tbl_master_facility.county_id ='$county_id' group by tbl_sub_county.id")->result();
        echo json_encode($get_partners);
    }

    function get_facilities() {
        $sub_county_id = urldecode($this->uri->segment(3));

        $get_facilities = $this->db->query("Select DISTINCT tbl_master_facility.id as facility_id, tbl_master_facility.name as facility_name
          from tbl_master_facility inner join tbl_patientdetails on tbl_patientdetails.facility_id = tbl_master_facility.code
          where tbl_master_facility.Sub_County_ID ='$sub_county_id' ")->result();
        echo json_encode($get_facilities);
    }

    function get_facilities_only() {
        $sub_county_id = $_SESSION['sub_county_id'];

        $get_facilities = $this->db->query("Select DISTINCT tbl_master_facility.id as facility_id, tbl_master_facility.name as facility_name
          from tbl_master_facility inner join tbl_patientdetails on tbl_patientdetails.facility_id = tbl_master_facility.code
          where tbl_master_facility.Sub_County_ID ='$sub_county_id' ")->result();
        echo json_encode($get_facilities);
    }

    function cascade() {

        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $this->db->select('SUM(CASE WHEN tbl_reports.response = 0 THEN 1 ELSE 0 END) AS no_response, SUM(CASE WHEN tbl_reports.response = 1 THEN 1 ELSE 0 END) AS yes_response,
                           SUM(CASE WHEN tbl_reports.response = 2 THEN 1 ELSE 0 END) AS neg_response, tbl_adherence.text ');
        $this->db->from('tbl_adherence');
        $this->db->join('reports', 'adherence.id = reports.adherence_level', 'left');
        $this->db->join('patientdetails', 'patientdetails.id = reports.p_details_id', 'left');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group', 'left');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id', 'left');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id', 'left');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id', 'left');
        $this->db->join('county', 'county.id = master_facility.county_id ', 'left');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID', 'left');
        $this->db->group_by('tbl_adherence.id');

        if (!empty($sub_county)) {

            $this->db->where('sub_county.id', $sub_county);
        }
        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
        }
        if (!empty($county)) {
            $this->db->where('county.id', $county);
        }
        if (!empty($facility)) {

            $this->db->where('master_facility.id', $facility);
        }
        if (!empty($cadre)) {

            $this->db->where('patientdetails.cadre_id', $cadre);
        }

        if (!empty($facility_level)) {

            $this->db->where('master_facility.keph_level', $facility_level);
        }
        if (!empty($age_group)) {

            $this->db->where('patientdetails.age_group', $age_group);
        }

        if (!empty($date_from)) {
            $this->db->where('patientdetails.date_registered >= ', $formated_date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('patientdetails.date_registered <=', $formated_date_to);
        }
        if ($_SESSION['user_level'] == 3) {
            $c = $_SESSION['county_id'];
            $this->db->where('county.id', $c);
        }
        if ($_SESSION['user_level'] == 4) {
            $c = $_SESSION['sub_county_id'];
            $this->db->where('sub_county.id', $c);
        }
        if ($_SESSION['user_level'] == 5) {
            $c = $_SESSION['facility_id'];
            $this->db->where('master_facility.id', $c);
        }

        $data = $this->db->get()->result_array();

        echo json_encode($data);
    }

    /*     * ***************** Filter Fns End *********** */

    function get_hcwbysex() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registration_by_sex($county, $sub_county, $facility, $facility_level, $cadre, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbysex() {
        $this->load->view('hcwbysex', $data);
    }

    function get_hcwbycadre() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registration_by_cadre($county, $sub_county, $facility, $facility_level, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbycadre() {
        $this->load->view('hcwbycadre', $data);
    }

    function get_hcwbyfacilitytype() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registered_hcw_byfacility($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbyfacilitytype() {
        $this->load->view('hcwbyfacilitytype', $data);
    }

    function get_hcwbycounty() {
        $cadre = $this->input->post('cadre', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registered_hcw_bycounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbycounty() {
        $this->load->view('hcwbycounty', $data);
    }

    function get_hcwbysubcounty() {
        $cadre = $this->input->post('cadre', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registered_hcw_by_subcounties($facility_level, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbysubcounty() {
        $this->load->view('hcwbysubcounty', $data);
    }

    function get_hcwbyagegroups() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registered_hcw_by_agegroups($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbyagegroups() {
        $this->load->view('hcwbyagegroups', $data);
    }

    function get_hcwbyfacilitylevels() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_registered_hcw_bytiers($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function hcwbyfacilitylevels() {
        $this->load->view('hcwbyfacilitylevels', $data);
    }

    function get_exposuresbysex() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bysex($county, $sub_county, $facility, $facility_level, $cadre, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbysex() {
        $this->load->view('exposuresbysex', $data);
    }

    function get_exposuresbycadre() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bycadre($county, $sub_county, $facility, $facility_level, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbycadre() {
        $this->load->view('exposuresbycadre', $data);
    }

    function exposuresbyfacilitytype() {
        $data['exp_by_facility'] = $this->mymodel->get_type_of_exposure_byfacility();
        $this->load->view('exposuresbyfacilitytype', $data);
    }

    function get_exposuresbycounty() {
        $cadre = $this->input->post('cadre', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bycounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbycounty() {
        $this->load->view('exposuresbycounty', $data);
    }

    function get_exposuresbysubcounty() {
        $cadre = $this->input->post('cadre', TRUE);
        $facility_level = $this->input->post('facility_level', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bysubcounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbysubcounty() {
        $this->load->view('exposuresbysubcounty', $data);
    }

    function get_exposuresbyagegroups() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_byagegroups($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbyagegroups() {
        $this->load->view('exposuresbyagegroups', $data);
    }

    function get_exposuresbylocation() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bylocation($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbylocation() {
        $this->load->view('exposuresbylocation', $data);
    }

    function addtots() {
        $data['hcws'] = $this->mymodel->get_hcws();
        $this->load->view('addtots', $data);
    }

    function get_exposuresbytype() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_bytype($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbytype() {
        $this->load->view('exposuresbytype', $data);
    }

    function get_exposuresbyfacilitylevels() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_exposures_bytiers($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbyfacilitylevels() {
        $this->load->view('exposuresbyfacilitylevels', $data);
    }

    function get_exposuresbyfacility() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $age_group = $this->input->post('age_group');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_exposures_byfacility($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbyfacility() {
        $this->load->view('exposuresbyfacility', $data);
    }

    function get_exposuresbytime() {
        $county = $this->input->post('county', TRUE);
        $sub_county = $this->input->post('sub_county', TRUE);
        $facility = $this->input->post('facility', TRUE);
        $cadre = $this->input->post('cadre', TRUE);
        $sex = $this->input->post('sex', TRUE);
        $facility_level = $this->input->post('facility_level');
        $date_from = $this->input->post('date_from', TRUE);
        $date_to = $this->input->post('date_to', TRUE);

        $hcws = $this->mymodel->get_type_of_exposure_byTime($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to);
        $data = json_encode($hcws);
        echo $data;
    }

    function exposuresbytime() {
        $this->load->view('exposurestime', $data);
    }

    function patients() {
        $patients = $this->data->getPatients();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["patients"] = $patients;
            $data["patientsd3"] = json_encode($patients);
            $view = "patients";
            $this->load->view('patients', $data);
        } else {
            echo json_encode($patients);
        }
    }

    function tiers() {
        if ($_SESSION['user_level'] == 1) {//County
            $this->load->view('tiers');
        }
    }

    function json_tier() {
        if ($_SESSION['user_level'] <= 2) {//Nascop  super user
            $patients = $this->data->tierone();
        }
        echo json_encode($patients);
    }

    function countypatients() {
        $countypatients = $this->data->getCountyPatients();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["countypatients"] = $countypatients;
            $this->load->view('countypatients', $data);
        } else {
            echo json_encode($countypatients);
        }
    }

    function subcountypatients() {
        $subcountypatients = $this->data->getSubCountyPatients();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["subcountypatients"] = $subcountypatients;
            $this->load->view('subcountypatients', $data);
        } else {
            echo json_encode($subcountypatients);
        }
    }

    function subcountyusers() {
        $users = $this->data->getSubCountyUsers();
        $facilities = $this->data->getFacilities();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["users"] = $users;
            $data["facilities"] = $facilities;
            $this->load->view('subcountyusers', $data);
        } else {
            echo json_encode($users);
        }
    }

    function facilitypatients() {
        $facilitypatients = $this->data->getFacilityPatients();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["facilitypatients"] = $facilitypatients;
            $this->load->view('facilitypatients', $data);
        } else {
            echo json_encode($facilitypatients);
        }
    }

    function reports() {
        $reports = $this->data->getReportsSuperuser();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["reports"] = $reports;
            $view = "reports";
            $this->load->view('reports', $data);
        } else {
            echo json_encode($reports);
        }
    }

    function countyreports() {
        $countyreports = $this->data->getCountyReports();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["countyreports"] = $countyreports;
            $this->load->view('countyreports', $data);
        } else {
            echo json_encode($countyreports);
        }
    }

    function subcountyreports() {
        $subcountyreports = $this->data->getSubCountyReports();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["subcountyreports"] = $subcountyreports;
            $this->load->view('subcountyreports', $data);
        } else {
            echo json_encode($subcountyreports);
        }
    }

    function facilityreports() {
        $facilityreports = $this->data->getFacilityReports();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["facilityreports"] = $facilityreports;
            $this->load->view('facilityreports', $data);
        } else {
            echo json_encode($facilityreports);
        }
    }

    function tots() {
        $tots = $this->data->getTots();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["tots"] = $tots;
            $this->load->view('tots', $data);
        } else {
            echo json_encode($tots);
        }
    }

    function users() {
        $ctyid = $_SESSION['county_id'];
        $sbctyid = $_SESSION['sub_county_id'];
        $userlevel = $_SESSION['user_level'];
        $ftyid = $_SESSION['facility_id'];
        $partner_id = $_SESSION['partner_id'];
        $users = $this->data->getUsers($userlevel, $partner_id);
        $partner = $this->data->getpartner();
        $sup_facility = $this->data->getSupFacility();
        $third_uri = $this->uri->segment(3);

        if (empty($third_uri) && $third_uri !== "json") {
            $data["users"] = $users;
            $data["partner"] = $partner;
            $data["sup_facility"] = $sup_facility;
            $this->load->view('dashboard', $data);
        } else {
            echo json_encode($users);
        }
    }

    function nascopusers() {
        $users = $this->data->getNascopUsers();
        $counties = $this->data->getCounties();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["users"] = $users;
            $data["counties"] = $counties;
            $this->load->view('nascopusers', $data);
        } else {
            echo json_encode($users);
        }
    }

    function countyusers() {
        $users = $this->data->getCountyUsers();
        $subcounties = $this->data->getSubCounties();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["users"] = $users;
            $data["subcounties"] = $subcounties;
            $this->load->view('countyusers', $data);
        } else {
            echo json_encode($users);
        }
    }

    function castsms() {
        $broadcast = $this->data->broadcasts();
        $county = $this->data->countylist();
        $cadre = $this->data->getcadre();
        $g_subcounty = $this->data->getSubcounty();
        $g_facility = $this->data->getfacility();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["broadcast"] = $broadcast;
            $data["counties"] = $county;
            $data["subcounty"] = $g_subcounty;
            $data["facility"] = $g_facility;
            $data["cadre"] = $cadre;

            $this->load->view('smscast', $data);
        } else {
            echo json_encode($broadcast);
        }
    }
    function add_tot() {
        $user = $this->users->add_tot();
        if ($user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function add_user() {
        $user = $this->users->add_user();
        //$validate_user = $this->data->check_user();
        $UserName = "UserExists";
        $Phone = "PhoneExists";
        $Success = "Done";
        if ($user === $Success) {
            echo "Success";
        } elseif ($user === $UserName) {
            echo "UserExists";
        } elseif ($user === $Phone) {
            echo "PhoneExists";
        }
    }

    function add_nascop_user() {
        $user = $this->users->add_nascop_user();
       $UserName = "UserExists";
        $Phone = "PhoneExists";
        $Success = "Done";
        if ($user === $Success) {
            echo "Success";
        } elseif ($user === $UserName) {
            echo "UserExists";
        } elseif ($user === $Phone) {
            echo "PhoneExists";
        }
    }

    function add_county_user() {
        $user = $this->users->add_county_user();
        $UserName = "UserExists";
        $Phone = "PhoneExists";
        $Success = "Done";
        if ($user === $Success) {
            echo "Success";
        } elseif ($user === $UserName) {
            echo "UserExists";
        } elseif ($user === $Phone) {
            echo "PhoneExists";
        }
    }

    function PartnerUser() {
        $user = $this->users->AddPartnerUser();
        $UserName = "UserExists";
        $Phone = "PhoneExists";
        $Success = "Done";
        if ($user === $Success) {
            echo "Success";
        } elseif ($user === $UserName) {
            echo "UserExists";
        } elseif ($user === $Phone) {
            echo "PhoneExists";
        }
    }

    function get_broadcast() {
        $id = $this->uri->segment(3);
        $user_info = $this->users->get_broadcast($id);
        if (empty($user_info)) {
            echo json_encode($user_info);
        } else {
            echo json_encode($user_info);
        }
    }

    function edit_broadcast() {
        $edit_broadcast = $this->data->edit_broadcastsms();
        if ($edit_broadcast) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function add_sub_county_user() {
        $user = $this->users->add_sub_county_user();
        if ($user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function get_user_info($id) {
        $id = $this->uri->segment(3);
        $user_info = $this->mymodel->get_user_info($id);
        if (empty($user_info)) {
            echo json_encode($user_info);
        } else {
            echo json_encode($user_info);
        }
    }

    function get_tot_info() {
        $id = $this->uri->segment(3);
        $user_info = $this->mymodel->get_tot_info($id);
        if (empty($user_info)) {
            echo json_encode($user_info);
        } else {
            echo json_encode($user_info);
        }
    }

    function edit_user() {
        $edit_user = $this->users->edit_user();
        if ($edit_user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function add_new_tot() {
        $add_new_tot = $this->mymodel->add_new_tot();
        if ($add_new_tot) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function edit_tot() {
        $edit_tot = $this->users->edit_tot();
        if ($edit_tot) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function delete_user() {
        $delete_user = $this->users->delete_users();
        if ($delete_user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function header() {
        $this->load->view("layout/header");
    }

}
