<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
    public $data = 'DBCentral';

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');

        $this->load->model('DBCentral');
        $this->data = new DBCentral();
    }

    public function index() {
        //$this->load->view('welcome_message');
        $hccadre = $this->data->getCadres();
        $mfl = $this->data->getfacility();
        if (empty($third_uri) && $third_uri !== "json") {
            $data["hcwcadre"] = $hccadre;
            $data["mfl"] = $mfl;
            $this->load->view('ucsf', $data);
        }
    }

     public function ipc() {
        $this->load->view('ipc');
        
    }

    function general() {
        $this->load->view('pages/forms/general');
    }

    function advanced() {
        $this->load->view('pages/forms/advanced');
    }

    function editors() {
        $this->load->view('pages/forms/editors');
    }

    

//    function AddHcwUcsf() {
//        $this->db->trans_start();
//        $fname = $this->input->post('fname');
//        $phone_no = $this->input->post('phone_no');
//        $lname = $this->input->post('lname');
//        $date_added = date("Y-m-d H:i:s");
//        $cadre_id = $this->input->post('cadre_id');
//        $gender = $this->input->post('gender_id');
//        $dob = $this->input->post('dob');
//        $facility_id = $this->input->post('facility_id');
//        //$registrationmode = 1;        
//        $partner = 2;
//
//        //$password = $this->cryptPass($phone_no);
//
//        $data_insert = array(
//            'f_name' => $fname,
//            'l_name' => $lname,
//            'mobile_no' => $phone_no,
//            'date_registered' => $date_added,
//            'cadre_id' => $cadre_id,
//            'gender_id' => $gender,
//            'DOB' => $dob,
//            'facility_id' => $facility_id,
//            'registrationmode' => 1,
//            'level' => 5,
//            'partner_id' => $partner
//        );
//        //$query = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $id), $limit, $offset);
//        //$hcwqry = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $phone_no))->result_array();
//
//        if ($hcwqry == null) {
//            $this->db->insert('tbl_patientdetails', $data_insert);
//            $this->db->trans_complete();
//            if ($this->db->trans_status() === FALSE) {
//                return FALSE;
//            } else {
//                //return TRUE;
//                return "OOPs Supervisor was not found";
//            }
//        } else {
//            echo 'Mobile Number Provided is registered already: ' . $phone_no . '<br>';
//        }
//    }

    function getHCW() {
        $cty = $this->input->post('phone_no');
        // $county="Tana River";
        $myarr = array();

        foreach ($cty as $county) {




            $qry = "Select * from tbl_patientdetails where mobile_no=?";
            $params = array($county);
            $res = $this->db->query($qry, $params);
            foreach ($res->result() as $x) {

                $id = $x->mobile_no;
                array_push($myarr, $id);
                //$qry1 = "Select * from tbl_master_facility where Sub_County_ID=? group by name";
                //select id,name from tbl_master ... where sub_country_id  in (233,233,334,344,333)
//                $params1 = array($id);
//                $res1 = $this->db->query($qry1, $params1);
//                foreach ($res1->result() as $x1) {
//
//                    $name = $x1->name;
//                    array_push($myarr, $name);
//                }
            }
        }

        echo json_encode($myarr);
    }

    

    function check_no() {
        $validate_user = $this->data->checkHCW();
        $Error = "Exists";
        $Success = "Not Exist";
        if ($validate_user === $Success) {
            echo "Success";
            //$this->AddHcwUcsf();
        } elseif ($validate_user === $Error) {
            echo "oops";
        }
    }
   

    

}
