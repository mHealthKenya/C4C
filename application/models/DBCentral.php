<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBCentral extends CI_Model {

    function search_tot($search_value) {
        $this->db->like('mobile_no', $search_value);
        $this->db->or_like('f_name', $search_value);
        $this->db->or_like('l_name', $search_value);
        $this->db->limit(10);
        $query = $this->db->get('patientdetails');
        return $query->result_array();
    }

    function edit_broadcastsms() {
        $this->db->trans_start();
        $id = $this->input->post('id', TRUE);
        $bname = $this->input->post('name', TRUE);
        $bmsg = $this->input->post('bmsg', TRUE);
        $ap_status = $this->input->post('ap_status', TRUE);
        $comment = $this->input->post('comment', TRUE);
        //echo 'Data passed : ' . $id . $name . $phone_no . $status . $facility . $county . $sub_county . '<br>';
        $data_update = array(
            'broadcastname' => $bname,
            'msg' => $bmsg,
            'approval_status' => $ap_status,
            'comment' => $comment
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_sms_broadcast', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function getNascopUsers() {
        $query = "SELECT tbl_staffdetails.id as user_id , tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, tbl_staffdetails.user_level, tbl_county.name as county, tbl_staffdetails.sub_county, tbl_staffdetails.facility, tbl_staffdetails.created, tbl_staffdetails.status FROM tbl_staffdetails inner join tbl_county on tbl_county.id = tbl_staffdetails.county WHERE user_level > '2'";
        return $this->db->query($query)->result_array();
    }

    function getCounties() {
        return $this->db->get('county')->result_array();
    }

    function getSubCountyPatients() {

        $query = "SELECT 
  tbl_master_facility.name AS facilityname,
  tbl_master_facility.code as mfl,
  tbl_county.name as county,
  tbl_sub_county.name as subcounty
FROM
  tbl_master_facility 
  
  INNER JOIN tbl_county 
    ON tbl_county.id = tbl_master_facility.county_id 
  INNER JOIN tbl_sub_county 
    ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID ";
        return $this->db->query($query)->result_array();
    }

    function get_user_info($id) {
        $query = "SELECT tbl_staffdetails.id as user_id , tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, tbl_staffdetails.user_level, tbl_staffdetails.county, tbl_staffdetails.sub_county, tbl_staffdetails.facility, tbl_staffdetails.created, tbl_staffdetails.status FROM tbl_staffdetails WHERE id = '$id'";
        return $this->db->query($query)->result_array();
    }

    function getCountyUsers() {
        $session = $_SESSION['county_id'];
        $query = "SELECT tbl_staffdetails.id as user_id, tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, "
                . "tbl_staffdetails.user_level, tbl_sub_county.name as sub_county, tbl_staffdetails.created, tbl_staffdetails.status "
                . "FROM tbl_staffdetails inner join tbl_sub_county on tbl_sub_county.id = tbl_staffdetails.sub_county "
                . "WHERE county = '$session'";
        return $this->db->query($query)->result_array();
    }

    function getSubCounties() {

        $session = $_SESSION['county_id'];
        $query = "SELECT tbl_sub_county.id, tbl_sub_county.name FROM tbl_sub_county inner join tbl_master_facility "
                . "on tbl_sub_county.id = tbl_master_facility.Sub_County_ID WHERE tbl_master_facility.county_id "
                . "= '$session' GROUP BY tbl_sub_county.name ";
        return $this->db->query($query)->result_array();
    }

    function getSubCountyUsers() {
        $session = $_SESSION['sub_county_id'];
        $query = "SELECT tbl_staffdetails.id as user_id , tbl_staffdetails.user_name, tbl_staffdetails."
                . "user_mobile, tbl_staffdetails.user_level,  tbl_master_facility.name as facility, "
                . "tbl_staffdetails.created, tbl_staffdetails.status FROM tbl_staffdetails inner "
                . "join tbl_master_facility on tbl_master_facility.code = tbl_staffdetails.facility"
                . " inner join tbl_sub_county on tbl_sub_county.id = tbl_master_facility.Sub_County_ID"
                . " WHERE  Sub_County_ID='$session'";
        return $this->db->query($query)->result_array();
    }

    function getTots() {

        $this->db->select('patientdetails.id, patientdetails.f_name, patientdetails.l_name, master_facility.name as facility, county.name as county, sub_county.name as sub_county, master_facility.target as target, patientdetails.mobile_no, patientdetails.modified as created, COUNT(tbl_patientdetails.id) as trained');
        $this->db->from('patientdetails');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
        $this->db->where('tbl_master_facility.target IS NOT NULL', null, false);
        $this->db->group_by('master_facility.code');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function add_new_tot() {
        $this->db->trans_start();
        $user_id = $this->input->post('id');
        $facility = $this->input->post('facility');
        $status = $this->input->post('target');
        echo 'Data passed : ' . $status . '<br>';
        $today = date('Y-m-d H:i:s');
        $data_update = array(
            'client_status' => $status,
            'modified' => $today
        );
        $data_update_tu = array(
            'target' => $status
        );
        $this->db->where('id', $user_id);
        $this->db->update('patientdetails', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            return FALSE;
        } else {
            $this->db->trans_start();
            $this->db->where('name', $facility);
            $this->db->update('master_facility', $data_update_tu);
            $this->db->trans_complete();
            if ($this->db->trans_status() == FALSE) {
                return FALSE;
            } else {
                return TRUE;
            }
            return TRUE;
        }
    }

    function broadcasts() {
        //$session = $_SESSION['sub_county_id'];
         $query = "SELECT msg, broadcastname from tbl_sms_broadcast order by id desc";

//         $query = "SELECT msg, broadcastname, sms_datetime, date_created, tbl_county.name AS county, tbl_sub_county.name AS sub_county,
// tbl_master_facility.name AS facility, tbl_cadre.name AS cadre FROM tbl_sms_broadcast 
// INNER JOIN tbl_county ON tbl_county.id = tbl_sms_broadcast.county_id
// INNER JOIN tbl_sub_county ON tbl_sub_county.id = tbl_sms_broadcast.sub_county_id
// INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_sms_broadcast.facility_id
// INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_sms_broadcast.cadre_id";
        return $this->db->query($query)->result_array();
    }

    function PartnerHcw() {
        //$session = $_SESSION['sub_county_id'];
        $query = "SELECT 
  tbl_patientdetails.f_name AS f_name,
  tbl_patientdetails.l_name AS l_name,
  tbl_gender.name AS gender ,
  tbl_cadre.name AS cadre,
  tbl_patientdetails.DOB AS DOB,
  tbl_patientdetails.mobile_no AS mobile_no
  
FROM
  tbl_patientdetails 
  INNER JOIN tbl_master_facility 
    ON tbl_master_facility.code = tbl_patientdetails.facility_id 
  INNER JOIN tbl_sub_county 
    ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID 
    INNER JOIN 
    tbl_county ON tbl_county.id=tbl_master_facility.county_id 
    INNER JOIN tbl_cadre ON 
    tbl_cadre.id=tbl_patientdetails.cadre_id
    INNER JOIN tbl_gender ON 
    tbl_gender.id=tbl_patientdetails.gender_id";
        return $this->db->query($query)->result_array();
    }

    function sheetdata() {
        //$session = $_SESSION['sub_county_id'];
        $query = "SELECT
  tbl_sheetdata.f_name AS NAME,
  tbl_sheetdata.mobile_no AS Mobile_Number,
  sms_status.`status` AS SMS_Status,
  tbl_messages.`messages` AS msg
FROM
  tbl_logs_outbox 
  INNER JOIN tbl_sheetdata 
    ON  tbl_sheetdata.mobile_no=tbl_logs_outbox.mobile_no 
    INNER JOIN `tbl_messages` ON tbl_messages.`id`=tbl_logs_outbox.`message_id`
    INNER JOIN sms_status ON `sms_status`.`id`=tbl_logs_outbox.`status`
    WHERE tbl_logs_outbox.`message_id`=116";
        return $this->db->query($query)->result_array();
    }

    function get_broadcast($id) {
        $query = "SELECT broadcastname AS bname,msg AS message,approval_status AS approval_status FROM tbl_sms_broadcast WHERE id = '$id'        ";
        return $this->db->query($query)->result_array();
    }

    function createnewbroadcast() {
        $this->db->trans_start();

        $user_ID = $_SESSION['user_id'];
        $county_ID = $this->input->post('county');
        $subcounty_ID = $this->input->post('sub_cou');
        $user_level = $_SESSION['user_level'];
        $cdre = $this->input->post('cadre');
        $date = $this->input->post('sms_datetime');
        $text = $this->input->post('msg');
        $facility = $this->input->post('facility');
        $broadcast_name = $this->input->post('broadcastname');


        $data_insert = array(
            'user_id' => $user_ID,
            'user_level' => $user_level,
            'county_id' => $county_ID,
            'sub_county_id' => $subcounty_ID,
            'cadre_id' => $cdre,
            'sms_datetime' => $date,
            'msg' => $text,
            'broadcastname' => $broadcast_name,
            'facility_id' => $facility,
        );
        $this->db->insert('tbl_sms_broadcast', $data_insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function get_state_info() {
        $query = "SELECT name FROM tbl_county";
        $states_info = $this->db->query($query);
        return $states_info;
    }

    public function get_city_info() {
        $state = $this->input->post("state");
        $query = "SELECT name FROM tbl_sub_county where county_id='$state' ";
        $city_info = $this->db->query($query);
        return $city_info;
    }

    function getCadres() {
        $query = "SELECT * FROM tbl_cadre";
        return $this->db->query($query)->result_array();
    }

    function getcadre() {
        // $session = $_SESSION['sub_county_id'];
        $query = "SELECT * FROM tbl_cadre";
        return $this->db->query($query)->result_array();
    }

    function getpartner() {
        // $session = $_SESSION['sub_county_id'];
        $query = "SELECT * FROM tbl_partners";
        return $this->db->query($query)->result_array();
    }

    function getSupFacility() {
        $query = "SELECT code, name FROM tbl_master_facility";
        return $this->db->query($query)->result_array();
    }

    function getFacilities() {

        $session = $_SESSION['sub_county_id'];
        $query = "SELECT * FROM tbl_master_facility WHERE tbl_master_facility.Sub_County_ID = '$session' ";
        return $this->db->query($query)->result_array();
    }

    function supFacility() {
        $query = "SELECT 
  tbl_master_facility.id AS facility_id,
  tbl_master_facility.name AS facility_name,
  tbl_master_facility.code AS CODE,
  tbl_master_facility.mobile,
  tbl_master_facility.email,
  tbl_county.id AS county_id,
  tbl_county.name AS county_name 
FROM
  `tbl_master_facility` 
  INNER JOIN tbl_county 
    ON tbl_county.id = tbl_master_facility.county_id 
WHERE partner_id IS NULL 
ORDER BY tbl_master_facility.code";
        $sql = $this->db->query($query)->result_array();
        return $sql;
    }

    function getfacility() {
        $query = "SELECT code, name FROM tbl_master_facility";
        return $this->db->query($query)->result_array();
    }

    function search_facility($search_value) {
        $this->db->like('code', $search_value);
        $this->db->or_like('name', $search_value);
        $this->db->limit(10);
        $query = $this->db->get('tbl_master_facility');
        return $query->result_array();
    }

    function add_facility() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $mfl_code = $this->input->post('mfl_code');
        $mobile = $this->input->post('mobile_no');
        $county = $this->input->post('county_name');
        $partner_id = $this->input->post('partner_id');


        $date_added = date("Y-m-d H:i:s");


        $query = $this->db->query("SELECT name FROM health_facilities where name='$name' LIMIT 1");
        $row = $query->row();
        $checked_facility_name = $row->name;

        if (empty($checked_facility_name)) {

            $data_insert = array(
                'name' => $name,
                'status' => $status,
                'date_added' => $date_added,
                'mobile' => $mobile,
                'county_id' => $county,
                'mfl' => $mfl_code,
                'partner_id' => $partner_id
            );
            $this->db->insert('health_facilities', $data_insert);
        } else {

            return FALSE;
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function countylist() {
        // $session = $_SESSION['sub_county_id'];
        $query = "SELECT id, name FROM tbl_county";
        return $this->db->query($query)->result_array();
    }

    function getCounty() {
        $query = "SELECT * FROM tbl_county";
        return $this->db->query($query)->result_array();
    }

    function getSubcounty() {
        $query = "SELECT * FROM tbl_sub_county";
        return $this->db->query($query)->result_array();
    }

    function getSubCountyPatientsbroadcast() {
        // $session = $_SESSION['sub_county_id'];
        $query = "SELECT * FROM tbl_cadre";
        return $this->db->query($query)->result_array();
    }

    function getbroadcasts() {
        //$session = $_SESSION['sub_county_id'];
        $query = "SELECT * from tbl_sms_broadcast";
        return $this->db->query($query)->result_array();
    }

    function get_tot_info($id) {
        $this->db->select('patientdetails.id, patientdetails.f_name, patientdetails.l_name, master_facility.name as facility, county.name as county, sub_county.name as sub_county, patientdetails.mobile_no, patientdetails.date_registered as created');
        $this->db->from('patientdetails');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
        $this->db->where('tbl_patientdetails.client_status IS NULL', null, TRUE);
        $this->db->where('tbl_patientdetails.id', $id);
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_hcws() {

        $this->db->select('patientdetails.id, patientdetails.f_name, patientdetails.l_name, master_facility.name as facility, county.name as county, sub_county.name as sub_county, patientdetails.mobile_no, patientdetails.date_registered as created');
        $this->db->from('patientdetails');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
        $this->db->where('tbl_patientdetails.client_status IS NULL', null, TRUE);
        $this->db->group_by('tbl_patientdetails.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_number_of_exposures($ctyid, $sbctyid, $level, $ftyid, $partner_id) {

        if ($level == 1) {
            $myqry = "select  p_details_id  from tbl_reports_all inner join tbl_patientdetails on tbl_patientdetails.id = tbl_reports_all.p_details_id inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.facility_id";
        } else if ($level == 2) {
            $myqry = "select  p_details_id  from tbl_reports_all inner join tbl_patientdetails on tbl_patientdetails.id = tbl_reports_all.p_details_id inner join tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.facility_id";
        } else if ($level == 3) {
            $myqry = "SELECT p_details_id AS exposures_no FROM tbl_reports_all AS rpts,tbl_patientdetails AS pd,tbl_master_facility AS mf WHERE  rpts.p_details_id=pd.id AND pd.facility_id=mf.code  AND mf.county_Id='" . $ctyid . "'";
        } else if ($level == 4) {
            $myqry = "SELECT p_details_id AS exposures_no FROM tbl_reports_all AS rpts,tbl_patientdetails AS pd,tbl_master_facility AS mf WHERE  rpts.p_details_id=pd.id AND pd.facility_id=mf.code  AND mf.Sub_County_Id='" . $sbctyid . "'";
        } else if ($level == 5) {

            $myqry = "SELECT p_details_id AS exposures_no FROM tbl_reports_all AS rpts,tbl_patientdetails AS pd,tbl_master_facility AS mf WHERE  rpts.p_details_id=pd.id AND pd.facility_id=mf.code  AND mf.code='" . $ftyid . "'";
        }


        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function getUsers($userlevel, $partner_id) {

        if ($userlevel == 2 || $userlevel == 1) {
            $query = "SELECT 
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
      LEFT JOIN tbl_master_facility 
        ON tbl_master_facility.code = tbl_staffdetails.facility 
      LEFT JOIN tbl_county 
        ON tbl_county.id = tbl_master_facility.county_id 
      LEFT JOIN tbl_sub_county 
        ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID where tbl_staffdetails.status='Active'";
            return $this->db->query($query)->result_array();
        } else if ($partner_id == 4) {
            $query = "SELECT 
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
    WHERE user_level = 7 and  tbl_staffdetails.status='Active' ";
            return $this->db->query($query)->result_array();
        } else if ($partner_id == 5) {
            $query = "SELECT  f_name,id FROM tbl_patientdetails WHERE du_no !=-1";
            return $this->db->query($query)->result_array();
        }
    }

    function getStudents() {
        $query = "SELECT  f_name,id FROM tbl_patientdetails WHERE partner_id=4";
        return $this->db->query($query)->result_array();
    }

    function reg_supervisors() {
        $myqry = "SELECT 
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
    WHERE user_level = 7";
        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function getSup() {
        $query = "SELECT id,user_name  FROM tbl_staffdetails WHERE user_level=7";
        return $this->db->query($query)->result_array();
    }

    function uonstuds() {

        $query = " SELECT 
  tbl_patientdetails.id AS id,         
  tbl_patientdetails.f_name AS f_name,
  tbl_patientdetails.l_name AS l_name,
  tbl_gender.name AS gender,
  tbl_master_facility.name AS  facility,
  tbl_gender.name AS gender
FROM
  tbl_patientdetails 
  
  INNER JOIN tbl_master_facility 
    ON tbl_master_facility.code = tbl_patientdetails.facility_id 
  INNER JOIN tbl_county 
    ON tbl_county.id = tbl_master_facility.county_id 
  INNER JOIN tbl_sub_county 
    ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID 
  INNER JOIN tbl_gender 
    ON tbl_gender.id = tbl_patientdetails.gender_id 
  INNER JOIN tbl_cadre 
    ON tbl_cadre.id = tbl_patientdetails.cadre_id  where tbl_patientdetails.partner_id like '%4'";
        return $this->db->query($query)->result_array();
    }

    function CheckedInStudents($userlevel, $partner_id) {

        $query = "SELECT 
  tbl_patientdetails.f_name AS f_name,
  tbl_patientdetails.l_name AS l_name,
  tbl_gender.name AS gender,
  tbl_CheckinStatus.status AS checkinstatus,
  tbl_checkin.checkin_time AS checkin_time,
  tbl_master_facility.name AS  facility 
FROM
  tbl_checkin 
  INNER JOIN tbl_patientdetails 
    ON tbl_patientdetails.mobile_no = tbl_checkin.mobile_no 
  INNER JOIN tbl_master_facility 
    ON tbl_master_facility.code = tbl_patientdetails.facility_id 
  INNER JOIN tbl_county 
    ON tbl_county.id = tbl_master_facility.county_id 
  INNER JOIN tbl_sub_county 
    ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID 
  INNER JOIN tbl_gender 
    ON tbl_gender.id = tbl_patientdetails.gender_id 
  INNER JOIN tbl_cadre 
    ON tbl_cadre.id = tbl_patientdetails.cadre_id 
  INNER JOIN tbl_CheckinStatus 
    ON tbl_CheckinStatus.id = tbl_checkin.CheckInStatus where tbl_patientdetails.partner_id=4";
        return $this->db->query($query)->result_array();
    }

    function CheckedInStudentsCount() {

        $myqry = "SELECT mobile_no FROM tbl_patientdetails WHERE partner_id like '%4';";

        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function PractionersCount() {
        $myqry = "SELECT date_registered FROM tbl_patientdetails WHERE du_no IS NOT NULL";
        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function KmpdubexpCount() {
        $myqry = "SELECT  p_details_id  FROM tbl_reports INNER JOIN tbl_patientdetails ON tbl_patientdetails.id = tbl_reports.p_details_id  WHERE tbl_patientdetails.`du_no` IS NOT NULL";
        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function kmpdumembers() {
        $query = " SELECT * FROM tbl_patientdetails WHERE du_no IS NOT NULL;";
        return $this->db->query($query)->result_array();
    }

    function KmpdubexpCounttbl() {

        $query = "    SELECT  *  FROM tbl_reports INNER JOIN tbl_patientdetails ON tbl_patientdetails.id = tbl_reports.p_details_id  WHERE tbl_patientdetails.`du_no` IS NOT NULL";
        return $this->db->query($query)->result_array();
    }

    function get_registered_hcw($ctyid, $sbctyid, $userlevel, $ftyid, $partner_id) {

        if ($userlevel == 1) {
            $myqry = "SELECT CODE FROM tbl_patientdetails 
INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id
INNER JOIN tbl_age_group ON tbl_age_group.id = tbl_patientdetails.age_group
INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_patientdetails.cadre_id
INNER JOIN tbl_gender ON tbl_gender.id = tbl_patientdetails.gender_id";
        } else if ($userlevel == 2) {
            $myqry = "SELECT mobile_no FROM tbl_patientdetails 
INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id
INNER JOIN tbl_age_group ON tbl_age_group.id = tbl_patientdetails.age_group
INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_patientdetails.cadre_id
INNER JOIN tbl_gender ON tbl_gender.id = tbl_patientdetails.gender_id";
        } else if ($userlevel == 3) {
            $myqry = "SELECT mobile_no FROM tbl_patientdetails 
INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id
INNER JOIN tbl_age_group ON tbl_age_group.id = tbl_patientdetails.age_group
INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_patientdetails.cadre_id
INNER JOIN tbl_gender ON tbl_gender.id = tbl_patientdetails.gender_id WHERE tbl_master_facility.county_id='" . $ctyid . "'";
        } else if ($userlevel == 4) {
            $myqry = "SELECT mobile_no FROM tbl_patientdetails 
INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id
INNER JOIN tbl_age_group ON tbl_age_group.id = tbl_patientdetails.age_group
INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_patientdetails.cadre_id
INNER JOIN tbl_gender ON tbl_gender.id = tbl_patientdetails.gender_id WHERE tbl_master_facility.Sub_County_ID='" . $sbctyid . "'";
        } else if ($userlevel == 5) {

            $myqry = "SELECT mobile_no FROM tbl_patientdetails 
INNER JOIN tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.facility_id
INNER JOIN tbl_age_group ON tbl_age_group.id = tbl_patientdetails.age_group
INNER JOIN tbl_cadre ON tbl_cadre.id = tbl_patientdetails.cadre_id
INNER JOIN tbl_gender ON tbl_gender.id = tbl_patientdetails.gender_id AND tbl_master_facility.code='" . $ftyid . "'";
        }


        $qry = $this->db->query($myqry);
        $res = $qry->num_rows();
        return $res;
    }

    function check_username($username) {
        return $this->db->get_where('staffdetails', array('username' => $username))->result_array();
    }

    function check_email($username) {
        return $this->db->get_where('staffdetails', array('username' => $username))->result_array();
    }

    function check_auth() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (filter_var($username)) {
            $check_existence = $this->db->get_where('tbl_staffdetails', array('username' => $username))->num_rows();
            $get_user_pass = $this->db->get_where('tbl_staffdetails', array('username' => $username))->result_array();
        }
        if ($check_existence === 1) {


            foreach ($get_user_pass as $value) {
                $status = $value['status'];
                $pass = $value['password'];
                $id = $value['id'];
                $crypted_pass = crypt($password, $value['password']);
                // echo 'Input pass : ' . $password . 'DBase password : ' . $value['password'] . '</br>';
                // exit();
                if ($crypted_pass === $pass && $status == 'Active') {
                    $this->Set_session($id);
                    return 'Login success';
                } else if ($crypted_pass === $pass && $status == 'In Active') {
                    return 'User is deactivated';
                } else {
                    return 'Wrong password';
                }
            }
        } else {
            return'User does not exist';
        }
    }

    function checkHCW() {

//        $phone_no = $this->input->post('phone_no');
//        $mobile = substr($phone_no, -9);
//        $len = strlen($mobile);
//
//        if ($len < 10) {
//            $dest = "+254" . $mobile;
//        }
        $fname = $this->input->post('fname');
        $mobile_no = $this->input->post('phone_no');
        $mobile = substr($mobile_no, -9);
        $len = strlen($mobile);
        if ($len < 10) {
            $phone_no = "+254" . $mobile;
        }
        $lname = $this->input->post('lname');
        $date_added = date("Y-m-d H:i:s");
        $creation_date = date("Y-m-d H:i:s");
        $cadre_id = $this->input->post('cadre_id');
        $gender = $this->input->post('gender_id');
        $dob = $this->input->post('dob');
        $facility_id = $this->input->post('facility_id');
        $idNo = $this->input->post('idno');
        $hbv = $this->input->post('hbv');
        $registrationmode = 1;
        $partner = 2;

        $check_existence = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $phone_no))->num_rows();
        $getMOB = $this->db->get_where('tbl_patientdetails', array('mobile_no' => $phone_no))->result_array();

        if ($check_existence >= 1) {
            foreach ($getMOB as $value) {
                $mob_no = $value['mobile_no'];
                if ($mob_no === $phone_no) {
                    return 'Exists';
                }
            }
        } else if ($check_existence == 0) {

            $this->AddHcwUcsf($fname, $phone_no, $lname, $date_added, $cadre_id, $gender, $dob, $facility_id, $registrationmode, $partner, $idNo, $hbv, $creation_date);
            return'Not Exist';
        }
    }

    function AddHcwUcsf($fname, $phone_no, $lname, $date_added, $cadre_id, $gender, $dob, $facility_id, $registrationmode, $partner, $idNo, $hbv, $creation_date) {
        $this->db->trans_start();
        $data_insert = array(
            'f_name' => $fname,
            'l_name' => $lname,
            'mobile_no' => $phone_no,
            'date_registered' => $date_added,
            'created_at' => $creation_date,
            'cadre_id' => $cadre_id,
            'gender_id' => $gender,
            'DOB' => $dob,
            'facility_id' => $facility_id,
            'registrationmode' => $registrationmode,
            'national_id' => $idNo,
            'hepatitis_b' => $hbv,
            'level' => 6,
            'partner_id' => $partner
        );

        $this->db->insert('tbl_patientdetails', $data_insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function Set_session($id) {
        $this->db->trans_start();
        $get_user_details = $this->db->get_where('tbl_staffdetails', array('id' => $id))->result();
        foreach ($get_user_details as $value) {
            $name = $value->user_name;
            $facility_id = $value->facility;
            $county_id = $value->county;
            $sub_county_id = $value->sub_county;
            $user_level = $value->user_level;
            $status = $value->status;
            $first_login = $value->first_login;
            $partner_id = $value->partner_id;

            $newsession = array(
                'user_id' => $id,
                'name' => $name,
                'logged_in' => TRUE,
                'status' => $status,
                'login' => $first_login,
                'user_level' => $user_level,
                'partner_id' => $partner_id
            );
            $this->session->set_userdata($newsession);
            //get partner name
            $get_partner_name = $this->db->get_where('tbl_partners', array('id' => $partner_id))->result();
            foreach ($get_partner_name as $partner_name) {
                $partner = $partner_name->name;
                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'partner_name' => $partner,
                    'logged_in' => TRUE,
                    'login' => $first_login,
                    'status' => $status,
                    'user_level' => $user_level,
                    'partner_id' => $partner_id
                );
                $this->session->set_userdata($newsession);
            }

            $get_county_name = $this->db->get_where('tbl_county', array('id' => $county_id))->result();
            foreach ($get_county_name as $county_name) {
                $county = $county_name->name;
                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'county' => $county,
                    'logged_in' => TRUE,
                    'login' => $first_login,
                    'status' => $status,
                    'user_level' => $user_level,
                    'county_id' => $county_id
                );
                $this->session->set_userdata($newsession);
            }

            $get_sub_county_name = $this->db->get_where('tbl_sub_county', array('id' => $sub_county_id))->result();

            foreach ($get_sub_county_name as $sub_county_name) {
                $sub_county = $sub_county_name->name;

                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'sub_county' => $sub_county,
                    'logged_in' => TRUE,
                    'login' => $first_login,
                    'status' => $status,
                    'user_level' => $user_level,
                    'county_id' => $county_id,
                    'sub_county_id' => $sub_county_id
                );
                $this->session->set_userdata($newsession);
            }

            $get_facility_name = $this->db->get_where('tbl_master_facility', array('code' => $facility_id))->result();

            foreach ($get_facility_name as $facility_name) {
                $facility = $facility_name->name;

                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'facility' => $facility,
                    'logged_in' => TRUE,
                    'status' => $status,
                    'user_level' => $user_level,
                    'login' => $first_login,
                    'county_id' => $county_id,
                    'sub_county_id' => $sub_county_id,
                    'facility_id' => $facility_id
                );
                $this->session->set_userdata($newsession);
            }
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            
        }
    }

    function get_no_of_counties() {

        $myqry = "select tmf.county_id,count(tmf.county_id) as total from tbl_county as tsc,tbl_patientdetails as pd,tbl_master_facility as tmf where pd.facility_id=tmf.code and tmf.county_id=tsc.id group by tmf.county_Id";
        $qry = $this->db->query($myqry);
        $res = $qry->result();
        return $res;
    }

    function get_no_of_facilities() {

        $myqry = "select facility_id,count(facility_id) as total from tbl_patientdetails group by facility_id";
        $qry = $this->db->query($myqry);
        $res = $qry->result();
        return $res;
    }

    function get_registered_hcw_byfacility($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('age_group.age_group as age_group,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
        $this->db->where('tbl_patientdetails.age_group IS NOT NULL', null, false);


        if (!empty($sub_county)) {
            $this->db->where('sub_county.id', $sub_county);
        }
        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
        }
        if (!empty($facility)) {

            $this->db->where('master_facility.id', $facility);
        }
        if (!empty($facility_level)) {

            $this->db->where('master_facility.keph_level', $facility_level);
        }
        if (!empty($cadre)) {

            $this->db->where('patientdetails.cadre_id', $cadre);
        }
        if (!empty($gender)) {
            $this->db->where('gender.id', $gender);
        }
        if (!empty($county)) {
            $this->db->where('county.id', $county);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_patientdetails.age_group');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    // function get_registration_by_sex($county, $sub_county, $facility, $facility_level, $cadre, $age_group, $date_from, $date_to) {


    //     if (!empty($date_from)) {


    //         $date_from = str_replace('-', '-', $date_from);
    //         $formated_date_from = date("Y-m-d", strtotime($date_from));
    //     }
    //     if (!empty($date_to)) {


    //         $date_to = str_replace('-', '-', $date_to);
    //         $formated_date_to = date("Y-m-d", strtotime($date_to));
    //     }

    //     $this->db->select('tbl_gender.name AS gender, COUNT(tbl_gender.id) AS total');
    //     $this->db->from('patientdetails');
    //     $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
    //     $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
    //     $this->db->join('gender', 'gender.id = patientdetails.gender_id');
    //     $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
    //     $this->db->join('county', 'county.id = master_facility.county_id ');
    //     $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');


    //     if (!empty($sub_county)) {
    //         $this->db->where('sub_county.id', $sub_county);
    //     }
    //     if (!empty($cadre)) {

    //         $this->db->where('cadre.id', $cadre);
    //     }
    //     if (!empty($facility)) {

    //         $this->db->where('master_facility.id', $facility);
    //     }
    //     if (!empty($facility_level)) {

    //         $this->db->where('master_facility.keph_level', $facility_level);
    //     }
    //     if (!empty($age_group)) {

    //         $this->db->where('patientdetails.age_group', $age_group);
    //     }
    //     if (!empty($gender)) {
    //         $this->db->where('gender.id', $gender);
    //     }
    //     if (!empty($county)) {
    //         $this->db->where('county.id', $county);
    //     }

    //     if (!empty($date_from)) {
    //         $this->db->where('patientdetails.date_registered >= ', $formated_date_from);
    //     }
    //     if (!empty($date_to)) {
    //         $this->db->where('patientdetails.date_registered <=', $formated_date_to);
    //     }
    //     if ($_SESSION['user_level'] == 3) {
    //         $c = $_SESSION['county_id'];
    //         $this->db->where('county.id', $c);
    //     }
    //     if ($_SESSION['user_level'] == 4) {
    //         $c = $_SESSION['sub_county_id'];
    //         $this->db->where('sub_county.id', $c);
    //     }
    //     if ($_SESSION['user_level'] == 5) {
    //         $c = $_SESSION['facility_id'];
    //         $this->db->where('master_facility.code', $c);
    //     }
    //     $this->db->group_by('tbl_gender.name');
    //     $sql = $this->db->get()->result_array();

    //     return $sql;
    // }

    function get_registration_by_sex($county, $sub_county, $facility, $facility_level, $cadre, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('gender AS gender, COUNT(gender) AS total');
        $this->db->from('tbl_rawdata');
       


        if (!empty($sub_county)) {
            $this->db->where('sub_county_id', $sub_county);
        }
        if (!empty($cadre)) {

            $this->db->where('cadre_id', $cadre);
        }
        if (!empty($facility)) {

            $this->db->where('mfl_no', $facility);
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
            $this->db->where('master_facility.code', $c);
        }
        $this->db->group_by('gender');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    // function getAllClients() {

    //     $query = "select * from tbl_clients order by enrollment_date desc";
    //     return $this->db->query($query)->result_array();
    // }

    public function get_total() 
    {
        return $this->db->count_all("tbl_rawdata");
    }
    public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('enrollment_date desc');
        $query = $this->db->get("tbl_rawdata");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

    function getAllClients() {

         $cnty_id = $_SESSION['county_id'];
         $subcntyID = $_SESSION['sub_county_id'];
         $facility_id = $_SESSION['facility_id'];
         $patn_id = $_SESSION['partner_id'];

        $this->db->select('first_name,last_name,mobile_no,gender,cadre,mfl_no,enrollment_date,facility,county,mfl_no');
        $this->db->from('tbl_rawdata');   


        if ($_SESSION['user_level'] == 3) {
            $c = $_SESSION['county_id'];
            $this->db->where('county_id', $c);
        }
        if ($_SESSION['user_level'] == 4) {
            $c = $_SESSION['sub_county_id'];
            $this->db->where('sub_county_id', $c);
        }
        if ($_SESSION['user_level'] == 5) {
            $c = $_SESSION['facility_id'];
            $this->db->where('mfl_no', $c);
        }
         if ($_SESSION['user_level'] == 6) {
            $c = $_SESSION['partner_id'];
            $this->db->where('partner_id', $c);
        }
        $this->db->order_by('enrollment_date desc');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function getCascade() {


        $query = "SELECT * FROM `tbl_cascade` order by date_exposed desc ";
        return $this->db->query($query)->result_array();
    }

    function getallexpo() {

        $query = "select * from tbl_raw_exposures order by enrollment_date desc";
        return $this->db->query($query)->result_array();
    }

    function get_sms($county, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('*');
        $this->db->from('clients_outbox_summ');




        if (!empty($county)) {
            $this->db->where('county', $county);
        }

        if (!empty($date_from)) {
            $this->db->where('date_created >=    ', $formated_date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('date_created <=', $formated_date_to);
        }

        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_myCascade($county, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('*');
        $this->db->from('cascade');



        if (!empty($county)) {
            $this->db->where('county', $county);
        }

        if (!empty($date_from)) {
            $this->db->where('date_exposed >=    ', $formated_date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('date_exposed <=', $formated_date_to);
        }

        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_mydata($county, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('first_name,last_name,mobile_no,gender,cadre,mfl_no,enrollment_date,facility,county,mfl_no');
        $this->db->from('tbl_rawdata');

        if (!empty($county)) {
            $this->db->where('county', $county);
        }

        if (!empty($date_from)) {
            $this->db->where('enrollment_date >=    ', $formated_date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('enrollment_date <=', $formated_date_to);
        }

        $this->db->order_by('enrollment_date desc');
        $sql = $this->db->get()->result_array();


        return $sql;
    }

    function get_exp($county, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {

            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('*');
        $this->db->from('raw_exposures');




        if (!empty($county)) {
            $this->db->where('county', $county);
        }

        if (!empty($date_from)) {
            $this->db->where('date_registered >=    ', $formated_date_from);
        }
        if (!empty($date_to)) {
            $this->db->where('date_registered <=', $formated_date_to);
        }

        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_registered_hcw_bycounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_county.name as county,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');

        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
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
            $this->db->where('patientdetails.date_registered <= ', $formated_date_to);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_county.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_registered_hcw_by_subcounties($facility_level, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_sub_county.name as sub_county,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');

        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_county.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_registered_hcw_by_agegroups($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_age_group.age_group as age_group,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_age_group.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_registered_hcw_bytiers($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_master_facility.keph_level as level,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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

        if (!empty($age_group)) {

            $this->db->where('age_group.id', $age_group);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_master_facility.keph_level');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_registration_by_cadre($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_cadre.name as cadre,count(tbl_patientdetails.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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

        if (!empty($age_group)) {

            $this->db->where('age_group.id', $age_group);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_cadre.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure() {

        $myqry = "select tr.exposure_type,count(tr.exposure_type) as total from tbl_reports as tr,tbl_exposure_type as tet where tr.exposure_type=tet.id group by tr.exposure_type";
        $qry = $this->db->query($myqry);
        $res = $qry->result();
        return $res;
    }

    function get_type_of_exposure_byfacility() {

        $myqry = "select pd.facility_id as ftyid,count(pd.facility_id) as total from tbl_reports as tr,tbl_exposure_type as tet,tbl_patientdetails as pd where tr.exposure_type=tet.id and tr.p_details_id=pd.id group by pd.facility_id";
        $qry = $this->db->query($myqry);
        $res = $qry->result();
        return $res;
    }

    function get_type_of_exposure_bysex($county, $sub_county, $facility, $facility_level, $cadre, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_gender.name AS gender, COUNT(tbl_reports.id) AS total');
        $this->db->from('patientdetails');
        $this->db->join('reports', 'reports.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');


        if (!empty($sub_county)) {
            $this->db->where('sub_county.id', $sub_county);
        }
        if (!empty($cadre)) {

            $this->db->where('cadre.id', $cadre);
        }
        if (!empty($facility)) {

            $this->db->where('master_facility.id', $facility);
        }
        if (!empty($facility_level)) {

            $this->db->where('master_facility.keph_level', $facility_level);
        }
        if (!empty($age_group)) {

            $this->db->where('patientdetails.age_group', $age_group);
        }
        if (!empty($gender)) {
            $this->db->where('gender.id', $gender);
        }
        if (!empty($county)) {
            $this->db->where('county.id', $county);
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
            $this->db->where('master_facility.code', $c);
        }
        $this->db->group_by('gender.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_exposures_bytiers($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_master_facility.keph_level as level,count(tbl_reports_all.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports_all', 'reports_all.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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

        if (!empty($age_group)) {

            $this->db->where('age_group.id', $age_group);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('master_facility.keph_level');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_exposures_byfacility($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_master_facility.name as level,count(tbl_reports_all.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports_all', 'reports_all.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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

        if (!empty($age_group)) {

            $this->db->where('age_group.id', $age_group);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('master_facility.name');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_bycadre($county, $sub_county, $facility, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_cadre.name as cadre,count(tbl_reports.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports', 'reports.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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

            $this->db->where('master_facility.code', $facility);
        }
        if (!empty($cadre)) {

            $this->db->where('patientdetails.cadre_id', $cadre);
        }

        if (!empty($age_group)) {

            $this->db->where('age_group.id', $age_group);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('tbl_cadre.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_bycounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_county.name as county,count(tbl_reports_all.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports_all', 'reports_all.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');

        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('county.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_byagegroups($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_age_group.age_group as age_group,count(tbl_reports.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports', 'reports.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('age_group.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_bytype($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_exposure_type.name as age_group,count(tbl_reports.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports', 'reports.p_details_id = patientdetails.id');
        $this->db->join('exposure_type', 'reports.exposure_type= exposure_type.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('exposure_type.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_bylocation($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_exposure_location.name as age_group,count(tbl_reports_all.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports_all', 'reports_all.p_details_id = patientdetails.id');
        $this->db->join('exposure_location', 'reports_all.exposure_location= exposure_location.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('exposure_location.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_byTime($county, $sub_county, $facility, $facility_level, $sex, $cadre, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('adherence.text as age_group, tbl_reports.response, count(tbl_reports.response) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports', 'reports.p_details_id = patientdetails.id');
        $this->db->join('adherence', 'adherence.id = reports.adherence_level');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');
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
            $this->db->where('master_facility.code', $c);
        }

        $this->db->group_by('adherence.text');
        $this->db->group_by('reports.response');
        $this->db->order_by('adherence.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    function get_type_of_exposure_bysubcounty($facility_level, $cadre, $sex, $age_group, $date_from, $date_to) {


        if (!empty($date_from)) {


            $date_from = str_replace('-', '-', $date_from);
            $formated_date_from = date("Y-m-d", strtotime($date_from));
        }
        if (!empty($date_to)) {


            $date_to = str_replace('-', '-', $date_to);
            $formated_date_to = date("Y-m-d", strtotime($date_to));
        }

        $this->db->select('tbl_sub_county.name as sub_county,count(tbl_reports_all.id) as total ');
        $this->db->from('patientdetails');
        $this->db->join('reports_all', 'reports_all.p_details_id = patientdetails.id');
        $this->db->join('age_group', 'age_group.id = patientdetails.age_group');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');

        if (!empty($sex)) {

            $this->db->where('gender.name', $sex);
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

        $this->db->group_by('tbl_reports_all.id');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

    /*     * ******************** FILTER FUNCTIONS ****************** */

    function getRegData() {

        $this->db->select('tbl_patientdetails.`f_name` AS FirstName, tbl_patientdetails.`l_name` AS LastName,
  tbl_patientdetails.`DOB` AS DOB, tbl_gender.`name` AS Gender, tbl_cadre.`name` AS Cadre,
  tbl_master_facility.`name` AS Facility, tbl_master_facility.`keph_level` AS LEVEL,
  tbl_sub_county.`name` AS Sub_County, tbl_county.`name` AS County,
  tbl_patientdetails.`date_registered` AS Date_Registered');
        $this->db->from('patientdetails');
        $this->db->join('cadre', 'cadre.id = patientdetails.cadre_id');
        $this->db->join('gender', 'gender.id = patientdetails.gender_id');
        $this->db->join('master_facility', 'master_facility.code = patientdetails.facility_id');
        $this->db->join('county', 'county.id = master_facility.county_id ');
        $this->db->join('sub_county', 'sub_county.id = master_facility.Sub_County_ID');


        $this->db->order_by('Date_Registered ASC');
        $sql = $this->db->get()->result_array();

        return $sql;
    }

}
