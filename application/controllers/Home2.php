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

    function __construct() {
        parent::__construct();


        $this->load->model('Facility_model');

        $this->check_access();
        $this->data = new DBCentral();
        $this->users = new User_model();
    }

//    function index() {
//        $this->load->view('welcome', $data);
//    }

    function check_access() {
        $logged_in = $this->session->userdata("logged_in");

        if ($logged_in) {

        } else {



            redirect("Login", "refresh");
        }
    }

//    function patients() {
//        $patients = $this->data->getPatients();
//        $third_uri = $this->uri->segment(3);
//        if (empty($third_uri) && $third_uri !== "json") {
//            $data["patients"] = $patients;
//            $data["patientsd3"] = json_encode($patients);
//            $view = "patients";
//            $this->load->view('patients', $data);
//        } else {
//            echo json_encode($patients);
//        }

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

    function jsonexposures() {

        if ($_SESSION['user_level'] <= 2) {//Nascop and  super user
            $patients = $this->data->getReportsSuperuser();
        } else if ($_SESSION['user_level'] = 3) {//County user
            $patients = $this->data->getReportsExposureChartsCounty();
        } else if ($_SESSION['user_level'] = 4) {//Subcounty user
            $patients = $this->data->getReportsExposureChartsSubCounty();
        } else if ($_SESSION['user_level'] = 5) {//Subcounty user
            $patients = $this->data->getReportsExposureChartsFacility();
        }

        echo json_encode($patients);
    }

    function jsondata() {
        if ($_SESSION['user_level'] <= 2) {//Nascop  super user
            $patients = $this->data->getPatientscharts();
        } else if ($_SESSION['user_level'] = 3) {//Nascop user
            $patients = $this->data->getCountyPatientscharts();
        } else if ($_SESSION['user_level'] = 4) {//Nascop user
            $patients = $this->data->getSubCountyPatientscharts();
        } else if ($_SESSION['user_level'] = 5) {//Nascop user
            $patients = $this->data->getFacilityPatientscharts();
        }
        echo json_encode($patients);
    }

    function exposures() {
        if ($_SESSION['user_level'] == 1) {//County
            $this->load->view('exposures');
        }
        if ($_SESSION['user_level'] == 2) {//County
            $this->load->view('exposures');
        } else if ($_SESSION['user_level'] == 3) {//County
            $this->load->view('countyexposures');
        } else if ($_SESSION['user_level'] == 4) {//Subcounty
            $this->load->view('subcountyexposures');
        } else if ($_SESSION['user_level'] == 5) {//Facility
            $this->load->view('facilityexposures');
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

    function json_tier_two() {
        if ($_SESSION['user_level'] <= 2) {//Nascop  super user
            $tiertwo = $this->data->tiertwo();
        }
        echo json_encode($tiertwo);
    }

    function json_tier_three() {
        if ($_SESSION['user_level'] <= 2) {//Nascop  super user
            $tiertwo = $this->data->tierthree();
        }
        echo json_encode($tiertwo);
    }

//    function index() {
//        $data = $this->data->data();
//        $third_uri = $this->uri->segment(3);
//        if (empty($third_uri) && $third_uri !== "json") {
//            $data["index"] = $data;
//            // $data["d3data"] = json_encode($data);
//            $view = "index";
//            $this->load->view('welcome', $data);
//        } else {
//            echo json_encode($data);
//        }
//    }

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
        $facilities = $this->data->getTOTFacilities();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["tots"] = $tots;
            $data["facilities"] = $facilities;
            $this->load->view('tots', $data);
        } else {
            echo json_encode($tots);
        }
    }

    function users() {
        $users = $this->data->getUsers();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["users"] = $users;

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

    function broadcastsms() {
        $broadcast = $this->data->getbroadcasts();
        $subcountypatients = $this->data->getSubCountyPatientsbroadcast();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["broadcast"] = $broadcast;
            $data["subcountypatients"] = $subcountypatients;
            $this->load->view('broadcastsms', $data);
        } else {
            echo json_encode($broadcast);
        }
    }

    function create_new_broadcast() {
        $broadcast = $this->data->createnewbroadcast();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["broadcast"] = $broadcast;
            $this->load->view('broadcastsms', $data);
        } else {
            echo json_encode($broadcast);
        }
    }

//    function create_new_broadcast() {
//       $broadcast = $this->data->createnewbroadcast();
//        if ($user) {
//            return 'Success';
//        } else {
//            return 'Fail';
//        }
//    }

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
        if ($user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function add_nascop_user() {
        $user = $this->users->add_nascop_user();
        if ($user) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    function add_county_user() {
        $user = $this->users->add_county_user();
        if ($user) {
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

    function get_user_info() {
        $id = $this->uri->segment(3);
        $user_info = $this->users->get_user_info($id);
        if (empty($user_info)) {
            echo json_encode($user_info);
        } else {
            echo json_encode($user_info);
        }
    }

    function get_tot_info() {
        $id = $this->uri->segment(3);
        $user_info = $this->users->get_tot_info($id);
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

    function login() {
        $view = 'Login';
        $this->load->view($view);
    }

    function header() {
        $this->load->view("layout/header");
    }

    function index() {
        $data = $this->data->data();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["index"] = $data;

//            $options = array(
//                'table' => 'no_of_hcws'
//            );
//            $data['no_hcws'] = $this->data->commonGet($options);




            $data['no_hcws'] = $this->db->query("Select count(id) as no_hcw from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.mfl_no")->result();
            $data['health_facilities'] = $this->db->query("Select count(tbl_master_facility.code) as no_health_facility from tbl_master_facility inner join tbl_patientdetails on tbl_patientdetails.mfl_no = tbl_master_facility.code group by tbl_master_facility.id")->result();
            $data['facility_type'] = $this->db->query("Select facility_type from"
                            . " tbl_master_facility "
                            . " GROUP BY  facility_type")->result();
            $data['facility_count'] = $this->db->query("Select  count(tbl_master_facility.facility_type)
                   as f_count from tbl_master_facility inner join tbl_patientdetails on
                     tbl_patientdetails.mfl_no = tbl_master_facility.code group by tbl_master_facility.facility_type")->result();



            $data['no_of_counties'] = $this->db->query("SELECT count(no) as no_counties FROM tbl_no_of_counties")->result();
            $data['no_of_sub_counties'] = $this->db->query("Select count(tbl_sub_county.id) as no_sub_county , tbl_sub_county.name from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.mfl_no inner join tbl_sub_county on tbl_sub_county.id = tbl_master_facility.sub_county_id group by tbl_sub_county.id")->result();
            $data["hcw_by_tiers"] = $this->db->query("SELECT tbl_county.name as county, tbl_county.Tier as Tier,COUNT(tbl_master_facility.county_id) as no_hcw FROM tbl_patientdetails tbl_patientdetails INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id  GROUP by tbl_county.name")->result();
            $data["hcw_by_county"] = $this->db->query("SELECT tbl_county.name as county, tbl_county.Tier as Tiers,COUNT(tbl_master_facility.county_id) as no_hcw  FROM tbl_patientdetails tbl_patientdetails INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id  GROUP by tbl_county.name")->result();
            $data["hcw_by_gender"] = $this->db->query("SELECT COUNT(tbl_patientdetails.gender) AS no_hcw,tbl_patientdetails.gender, tbl_county.name as county FROM tbl_patientdetails
INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no  INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID  INNER JOIN cadres_dictionary ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres  ON cadres.level=cadres_dictionary.cadre_id GROUP BY tbl_patientdetails.gender ")->result();

            $data["hcw_by_cadre"] = $this->db->query("SELECT name AS cadre FROM cadres ")->result();
            $data["count_cadre"] = $this->db->query("SELECT COUNT( cadres.name) AS no_hcw
          FROM tbl_patientdetails INNER JOIN tbl_master_facility ON
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                    ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres
                    ON cadres.level=cadres_dictionary.cadre_id INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID GROUP BY cadres.name")->result();


            $data['female_count'] = $this->db->query("SELECT gender FROM tbl_patientdetails WHERE gender ='female'")->num_rows();
            $data['male_count'] = $this->db->query("SELECT gender FROM tbl_patientdetails WHERE gender='male'")->num_rows();
            $data['county_exposure_count'] = $this->db->query("Select t1.messages as exposed from tbl_county
inner join tbl_master_facility on  tbl_master_facility.county_id = tbl_county.id
inner join tbl_patientdetails on  tbl_patientdetails.mfl_no = tbl_master_facility.code
LEFT JOIN (select county_sub.name as county_sub_name, count(messages.id) as messages from messages
inner join tbl_patientdetails as sub_patients on sub_patients.p_mobile = messages.mobile
inner join tbl_master_facility as sub_facility on sub_facility.code = sub_patients.mfl_no
inner join tbl_county as county_sub on county_sub.id = sub_facility.county_id group by county_sub.name) as t1 on t1.county_sub_name = tbl_county.name group by tbl_county.name")->result();


            $data['county_name'] = $this->db->query("select tbl_county.name as c_name FROM tbl_reports INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id GROUP BY tbl_county.name")->result();
            $data['county_exp_cout'] = $this->db->query("SELECT COUNT(tbl_reports.c_mobile) FROM tbl_master_facility
INNER JOIN tbl_patientdetails ON
                     tbl_patientdetails.mfl_no = tbl_master_facility.code
                     INNER JOIN tbl_reports ON tbl_reports.p_id=tbl_patientdetails.p_id
                     INNER JOIN  tbl_county on  tbl_county.id=tbl_master_facility.county_id
                     GROUP BY tbl_county.name")->result();
            $data['county_name_exposure'] = $this->db->query("select COUNT(tbl_reports.c_mobile) as reports_count FROM tbl_reports INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id GROUP BY tbl_county.name")->result();
            $data['county_exposures_number_count'] = $this->db->query("select count(c_mobile) as exposures FROM tbl_reports INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id GROUP BY tbl_county.name")->result();
            $data['exposure_type_count'] = $this->db->query("SELECT count(msg_exptype)as count_exposure FROM tbl_reports GROUP BY msg_exptype")->result();
            $data['exposure_type'] = $this->db->query("SELECT msg_exptype as type FROM tbl_reports GROUP BY msg_exptype")->result();

            $data['exposures_cadre_count'] = $this->db->query("SELECT COUNT(cadres.name) AS no_hcw FROM tbl_patientdetails  INNER JOIN cadres_dictionary
                    ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre
                    INNER JOIN tbl_reports on tbl_reports.c_mobile=tbl_patientdetails.p_mobile
                    INNER JOIN cadres
                    ON cadres.level=cadres_dictionary.cadre_id  GROUP BY cadres.name")->result();
            $data['exposures_location'] = $this->db->query("SELECT loc_name as location_name FROM exposure_location")->result();
            $data['exposures_location_count'] = $this->db->query("SELECT COUNT(location) as location_count FROM tbl_reports GROUP by location")->result();
            $data['exposures_facility_count'] = $this->db->query("SELECT COUNT(tbl_master_facility.facility_type)
                   AS f_count FROM tbl_master_facility INNER JOIN tbl_patientdetails ON
                     tbl_patientdetails.mfl_no = tbl_master_facility.code
                     INNER JOIN tbl_reports ON tbl_reports.c_mobile=tbl_patientdetails.p_mobile
                     GROUP BY tbl_master_facility.facility_type")->result();
            $data['female_exposure'] = $this->db->query("SELECT gender FROM tbl_patientdetails INNER JOIN tbl_reports on tbl_reports.p_id =tbl_patientdetails.p_id  WHERE gender ='female'")->num_rows();
            $data['male_exposure'] = $this->db->query("SELECT gender FROM tbl_patientdetails INNER JOIN tbl_reports on tbl_reports.p_id =tbl_patientdetails.p_id  WHERE gender ='male'")->num_rows();

//            $count=0;
//            foreach ($mydt as $f){
//               $count+=1;
//            }
         $this->load->view('hcw_dashboard', $data);
        } else {
            echo json_encode($data);
        }
    }

    function exposure_dashboard() {
        $data = $this->data->data();
        $third_uri = $this->uri->segment(3);
        if (empty($third_uri) && $third_uri !== "json") {
            $data["index"] = $data;







            $data['exposure_type'] = $this->db->query("Select count(msg_exptype) as exposure_type, msg_exptype from tbl_reports group by tbl_reports.msg_exptype order by exposure_type DESC LIMIT 1")->result();


            $data['exposure_location'] = $this->db->query("Select count(location) as exposure_location, location from tbl_reports group by tbl_reports.location order by exposure_location DESC LIMIT 1 ")->result();




            $data['all_exposures'] = $this->db->query("SELECT COUNT(messages.id) as no_exposed FROM messages")->result();
            $data['all_hcw_exposed'] = $this->db->query("Select count(messages.p_id) as no from messages inner join tbl_patientdetails on tbl_patientdetails.p_mobile= messages.mobile group by messages.mobile")->result();
            $data["exposures_by_cadre"] = $this->db->query("Select main_cadres.name as main_cadre_name ,t1.Exposed, IFNULL(count(main_patient.p_id),0) as total_count from cadres as main_cadres
inner join cadres_dictionary as main_cadres_dict on main_cadres_dict.cadre_id = main_cadres.level
inner join tbl_patientdetails as main_patient on main_patient.cadre = main_cadres_dict.specified_cadre
inner join tbl_master_facility as master_facility on master_facility.code = main_patient.mfl_no
 LEFT JOIN (SELECT sub_cadres.name as sub_cadre_name, IFNULL(count(patient_sub.p_id),0) as Exposed FROM cadres as sub_cadres
  inner join cadres_dictionary as cadre_sub on cadre_sub.cadre_id = sub_cadres.level
  inner join tbl_patientdetails as patient_sub on patient_sub.cadre = cadre_sub.specified_cadre
  inner join messages as sub_messages on sub_messages.p_id = patient_sub.p_id group by sub_cadres.name ) as t1 ON t1.sub_cadre_name = main_cadres.name group by main_cadres.name")->result();
            $data["exposures_by_gender"] = $this->db->query("SELECT tbl_county.name as county, tbl_county.Tier as Tiers,COUNT(tbl_master_facility.county_id) as no_hcw  FROM tbl_patientdetails tbl_patientdetails INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id  GROUP by tbl_county.name")->result();
            $data["exposures_reported"] = $this->db->query("SELECT COUNT(tbl_patientdetails.gender) AS no_hcw,tbl_patientdetails.gender, tbl_county.name as county FROM tbl_patientdetails
INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no  INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID  INNER JOIN cadres_dictionary ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres  ON cadres.level=cadres_dictionary.cadre_id GROUP BY tbl_patientdetails.gender ")->result();
            $data["exposures_by_county"] = $this->db->query("select t1.messages as exposed from tbl_county
inner join tbl_master_facility on  tbl_master_facility.county_id = tbl_county.id
inner join tbl_patientdetails on  tbl_patientdetails.mfl_no = tbl_master_facility.code
LEFT JOIN (select county_sub.name as county_sub_name, count(messages.id) as messages from messages
inner join tbl_patientdetails as sub_patients on sub_patients.p_mobile = messages.mobile
inner join tbl_master_facility as sub_facility on sub_facility.code = sub_patients.mfl_no
inner join tbl_county as county_sub on county_sub.id = sub_facility.county_id group by county_sub.name) as t1 on t1.county_sub_name = tbl_county.name group by tbl_county.name")->result();
            $data['county_name'] = $this->db->query("select tbl_county.name as county from tbl_county
inner join tbl_master_facility on  tbl_master_facility.county_id = tbl_county.id
inner join tbl_patientdetails on  tbl_patientdetails.mfl_no = tbl_master_facility.code
LEFT JOIN (select county_sub.name as county_sub_name, count(messages.id) as messages from messages
inner join tbl_patientdetails as sub_patients on sub_patients.p_mobile = messages.mobile
inner join tbl_master_facility as sub_facility on sub_facility.code = sub_patients.mfl_no
inner join tbl_county as county_sub on county_sub.id = sub_facility.county_id group by county_sub.name) as t1 on t1.county_sub_name = tbl_county.name group by tbl_county.name
")->result();


            $data['all_hcws'] = $this->db->query("Select count(id) as no_hcw from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.mfl_no")->result();






            $this->load->view('exposure_dashboard', $data);
        } else {
            echo json_encode($data);
        }
    }

}
