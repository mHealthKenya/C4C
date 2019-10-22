<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBCentral extends CI_Model {

    function getTots() {
        $query = "SELECT tbl_tot.id as user_id , tbl_tot.FirstName, tbl_tot.LastName, tbl_tot.PhoneNumber, "
                . "tbl_tot.Date as created, tbl_county.name as county, tbl_sub_county.name as sub_county, "
                . "tbl_master_facility.name as facility FROM tbl_tot inner join tbl_master_facility on "
                . "tbl_master_facility.code = tbl_tot.Facility inner join tbl_county on tbl_county.id = "
                . "tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id = "
                . "tbl_master_facility.Sub_County_ID ORDER BY Date ASC";
        return $this->db->query($query)->result_array();
    }

    function getTots2() {
        $query = "SELECT tbl_tot.id as user_id , tbl_tot.FirstName, tbl_tot.LastName, tbl_tot.PhoneNumber, "
                . "tbl_tot.Date as created, tbl_county.name as county, tbl_sub_county.name as sub_county, "
                . "tbl_master_facility.name as facility FROM tbl_tot inner join tbl_master_facility on "
                . "tbl_master_facility.code = tbl_tot.Facility inner join tbl_county on tbl_county.id = "
                . "tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id = "
                . "tbl_master_facility.Sub_County_ID ORDER BY Date ASC";
        return $this->db->query($query)->result_array();
    }

    function getUsers() {
        $query = "SELECT tbl_staffdetails.id as user_id , tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, tbl_staffdetails.user_level, tbl_staffdetails.county, tbl_staffdetails.sub_county, tbl_staffdetails.facility, tbl_staffdetails.created, tbl_staffdetails.status FROM tbl_staffdetails WHERE user_level <> '1'";
        return $this->db->query($query)->result_array();
    }

//    function getNascopUsers() {
//        $query = "SELECT tbl_staffdetails.id as user_id , tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, tbl_staffdetails.user_level, tbl_county.name as county, tbl_staffdetails.sub_county, tbl_staffdetails.facility, tbl_staffdetails.created, tbl_staffdetails.status FROM tbl_staffdetails inner join tbl_county on tbl_county.id = tbl_staffdetails.county WHERE user_level > '2'";
//        return $this->db->query($query)->result_array();
//    }

//    function getCountyUsers() {
//        $session = $_SESSION['county_id'];
//        $query = "SELECT tbl_staffdetails.id as user_id, tbl_staffdetails.user_name, tbl_staffdetails.user_mobile, "
//                . "tbl_staffdetails.user_level, tbl_sub_county.name as sub_county, tbl_staffdetails.created, tbl_staffdetails.status "
//                . "FROM tbl_staffdetails inner join tbl_sub_county on tbl_sub_county.id = tbl_staffdetails.sub_county "
//                . "WHERE county = '$session'";
//        return $this->db->query($query)->result_array();
//    }

    function getbroadcasts() {
        //$session = $_SESSION['sub_county_id'];
        $query = "SELECT * from tbl_sms_broadcast";
        return $this->db->query($query)->result_array();
    }

//    function createnewbroadcast() {
//        $this->db->trans_start();
//
//        $user_ID = $_SESSION['user_id'];
//        $county_ID = $_SESSION['county_id'];
//        $subcounty_ID = $_SESSION['sub_county_id'];
//        $user_level = $_SESSION['user_level'];
//        $cadre = $this->input->post('cadre_id');
//        $date = $this->input->post('sms_datetime');
//        $text = $this->input->post('msg');
//        $facility = $this->input->post('facility_id');
//        $broadcast_name = $this->input->post('broadcastname');
//
//
//        $data_insert = array(
//            'user_id' => $user_ID,
//            'user_level' => $user_level,
//            'county_id' => $county_ID,
//            'sub_county_id' => $subcounty_ID,
//            'cadre_id' => $cadre,
//            'sms_datetime' => $date,
//            'msg' => $text,
//            'broadcastname' => $broadcast_name,
//            'facility_id' => $facility,
//        );
//        $this->db->insert('tbl_sms_broadcast', $data_insert);
//        $this->db->trans_complete();
//        if ($this->db->trans_status() === FALSE) {
//            return FALSE;
//        } else {
//                      return TRUE;
//        }
//    }

    function getPatients() {//All the HCWs
        $queryone = "update tbl_patientdetails SET gender='Female' WHERE gender='2'";
        $querytwo = "update tbl_patientdetails SET gender='Male' WHERE gender='1'";
        $querythree = "update tbl_patientdetails SET cadre='Doctor' WHERE cadre='Doctor' ";
        $query1 = $this->db->query($queryone);
        $query2 = $this->db->query($querytwo);
        $query3 = $this->db->query($querythree);


        if ($_SESSION['user_level'] <= 2) {
            $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names as names,"
                    . "tbl_patientdetails.gender as gender,tbl_patientdetails.national_id as national_Id,"
                    . "tbl_patientdetails.national_id ,tbl_patientdetails.date_admitted"
                    . " as date_registered,cadres.name as cadre,"
                    . "tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name"
                    . " as sub_county from tbl_patientdetails INNER JOIN tbl_master_facility on "
                    . "tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary"
                    . " on cadres_dictionary.specified_cadre=tbl_patientdetails.cadre inner join cadres "
                    . "on cadres.level=cadres_dictionary.cadre_id inner join tbl_county on tbl_county.id = "
                    . "tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id = "
                    . "tbl_master_facility.Sub_County_ID";

            return $this->db->query($query)->result_array();
        }
    }

    function getPatientscharts() {//All the HCWs
        $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names,cadres.name as cadre,
                    tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name
                     as sub_county from tbl_patientdetails INNER JOIN tbl_master_facility on
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     on cadres_dictionary.specified_cadre=tbl_patientdetails.cadre inner join cadres
                    on cadres.level=cadres_dictionary.cadre_id inner join tbl_county on tbl_county.id =
                    tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID";

        return $this->db->query($query)->result_array();
    }

    function tierone() {//All the HCWs
        $query = "SELECT cadres.name AS cadre,tbl_county.name AS county FROM tbl_patientdetails INNER JOIN tbl_master_facility ON
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres
                    ON cadres.level=cadres_dictionary.cadre_id INNER JOIN tbl_county ON tbl_county.id =
                    tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID  where tbl_master_facility.county_id='17'";

        return $this->db->query($query)->result_array();
    }

    function tiertwo() {//All the HCWs
        $query = "SELECT cadres.name AS cadre,tbl_county.name AS county FROM tbl_patientdetails INNER JOIN tbl_master_facility ON
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres
                    ON cadres.level=cadres_dictionary.cadre_id INNER JOIN tbl_county ON tbl_county.id =
                    tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID  WHERE tbl_master_facility.county_id='14' OR
                    tbl_master_facility.county_id=28";

        return $this->db->query($query)->result_array();
    }

    function tierthree() {//All the HCWs
        $query = "SELECT cadres.name AS cadre,
                   tbl_county.name AS county FROM tbl_patientdetails INNER JOIN tbl_master_facility ON
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre INNER JOIN cadres
                    ON cadres.level=cadres_dictionary.cadre_id INNER JOIN tbl_county ON tbl_county.id =
                    tbl_master_facility.county_id INNER JOIN tbl_sub_county ON tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID  WHERE tbl_master_facility.county_id=18 OR
                    tbl_master_facility.county_id=22 OR tbl_master_facility.county_id=26 OR
                    tbl_master_facility.county_id=29 OR
                    tbl_master_facility.county_id=43";

        return $this->db->query($query)->result_array();
    }

    function getSubCountyPatientscharts() {
        $session = $_SESSION['sub_county_id'];
        $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names,cadres.name as cadre,
                    tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name
                     as sub_county from tbl_patientdetails INNER JOIN tbl_master_facility on
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     on cadres_dictionary.specified_cadre=tbl_patientdetails.cadre inner join cadres
                    on cadres.level=cadres_dictionary.cadre_id inner join tbl_county on tbl_county.id =
                    tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID WHERE tbl_master_facility.Sub_County_ID='$session'";
        return $this->db->query($query)->result_array();
    }

    function getCountyPatientscharts() {
        $session = $_SESSION['county_id'];
        $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names,cadres.name as cadre,
                    tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name
                     as sub_county from tbl_patientdetails INNER JOIN tbl_master_facility on
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     on cadres_dictionary.specified_cadre=tbl_patientdetails.cadre inner join cadres
                    on cadres.level=cadres_dictionary.cadre_id inner join tbl_county on tbl_county.id =
                    tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID WHERE tbl_master_facility.county_id='$session'";
        return $this->db->query($query)->result_array();
    }

    function getFacilityPatientscharts() { //Facility HCws
        $session = $_SESSION['facility_id'];
        $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names,cadres.name as cadre,
                    tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name
                     as sub_county,tbl_patientdetails.mfl_no from tbl_patientdetails INNER JOIN tbl_master_facility on
                    tbl_master_facility.code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary
                     on cadres_dictionary.specified_cadre=tbl_patientdetails.cadre inner join cadres
                    on cadres.level=cadres_dictionary.cadre_id inner join tbl_county on tbl_county.id =
                    tbl_master_facility.county_id inner join tbl_sub_county on tbl_sub_county.id =
                    tbl_master_facility.Sub_County_ID WHERE tbl_patientdetails.mfl_no = '$session'";
        return $this->db->query($query)->result_array();
    }

    function data() {
        if ($_SESSION['user_level'] >= 5) {
            $query = "SELECT * from tbl_patientdetails";
            return $this->db->query($query)->result_array();
        }
    }

    function getFacilityPatients() { //Facility HCws
        $session = $_SESSION['facility_id'];
        $query = "SELECT tbl_patientdetails.names, tbl_patientdetails.national_Id, tbl_patientdetails.gender, "
                . "tbl_patientdetails.cadre, tbl_patientdetails.date_admitted from tbl_patientdetails "
                . "WHERE tbl_patientdetails.mfl_no = '$session'";
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

    function getFacilityReports() { //Facility Reports
        $session = $_SESSION['facility_id'];
        $query = "SELECT tbl_reports.datetime, tbl_reports.exposure_date, tbl_reports.exposure_hours, "
                . "tbl_reports.msg_exptype, tbl_reports.location, tbl_patientdetails.names as name, "
                . "tbl_patientdetails.cadre, tbl_patientdetails.gender from tbl_reports inner join "
                . "tbl_patientdetails on tbl_patientdetails.p_id = tbl_reports.p_id WHERE "
                . "tbl_patientdetails.mfl_no = '$session'";
        return $this->db->query($query)->result_array();
    }

    function getTOTFacilities() {
        return $this->db->get('master_facility')->result_array();
    }

    

//    function getSubCounties() {
//
//        $session = $_SESSION['county_id'];
//        $query = "SELECT tbl_sub_county.id, tbl_sub_county.name FROM tbl_sub_county inner join tbl_master_facility "
//                . "on tbl_sub_county.id = tbl_master_facility.Sub_County_ID WHERE tbl_master_facility.county_id "
//                . "= '$session' GROUP BY tbl_sub_county.name ";
//        return $this->db->query($query)->result_array();
//    }

    function getFacilities() {

        $session = $_SESSION['sub_county_id'];
        $query = "SELECT * FROM tbl_master_facility WHERE tbl_master_facility.Sub_County_ID = '$session' ";
        return $this->db->query($query)->result_array();
    }

    function getReportsSuperuser() {

        $query = "SELECT tbl_reports.exposure_date AS exposure_date,tbl_reports.datetime AS
                      Report_date,tbl_reports.location AS Exposure_Location,tbl_reports.exposure_hours AS exposure_hours,
                      tbl_reports.msg_exptype AS Exposure_Type,messages.report_date
                      AS report_date,tbl_patientdetails.p_mobile AS Mobile_number,
                      tbl_patientdetails.names AS HCW_Name,tbl_patientdetails.gender AS gender,
                      cadres.name AS cadre,tbl_master_facility.name
                      AS facility,tbl_county.name AS county, tbl_sub_county.name AS sub_county
                      FROM tbl_reports
                      INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile
                      INNER JOIN messages ON messages.mobile=tbl_reports.c_mobile
                      INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no
                      INNER JOIN cadres_dictionary ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre
                      INNER JOIN cadres ON cadres.level=cadres_dictionary.cadre_id
                      INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id
                      INNER JOIN tbl_sub_county ON tbl_sub_county.id =  tbl_master_facility.Sub_County_ID
                      GROUP BY tbl_patientdetails.p_mobile";
        return $this->db->query($query)->result_array();
    }

    function getReportsExposureChartsCounty() {
        $session = $_SESSION['county_id'];
        $query = "SELECT
  tbl_reports.exposure_date AS exposure_date,
  tbl_reports.datetime AS Report_date,
  tbl_reports.location AS Exposure_Location,
  tbl_reports.msg_exptype AS Exposure_Type,
  messages.report_date AS report_date,
  tbl_patientdetails.names AS HCW_Name,
  tbl_patientdetails.county AS county,
  tbl_patientdetails.pf_attach AS facility,
  tbl_sub_county.name AS sub_county
  cadres.name AS cadre,
FROM
  tbl_reports
INNER JOIN
  tbl_patientdetails ON tbl_patientdetails.p_mobile = tbl_reports.c_mobile
INNER JOIN
  messages ON messages.mobile = tbl_patientdetails.p_mobile
INNER JOIN
  tbl_reports AS reportstable ON tbl_reports.c_mobile = messages.mobile
INNER JOIN
  tbl_master_facility ON tbl_master_facility.code = tbl_patientdetails.mfl_no
INNER JOIN
  cadres_dictionary ON cadres_dictionary.specified_cadre = tbl_patientdetails.cadre
INNER JOIN
  cadres ON cadres.level = cadres_dictionary.cadre_id
INNER JOIN
  tbl_sub_county ON tbl_sub_county.id = tbl_master_facility.Sub_County_ID
GROUP BY
  tbl_patientdetails.p_mobile";
        return $this->db->query($query)->result_array();
    }

    function getReportsExposureChartsSubCounty() {
        $session = $_SESSION['sub_county_id'];
        $query = "SELECT tbl_reports.exposure_date AS exposure_date,tbl_reports.datetime AS
                      Report_date,tbl_reports.location AS Exposure_Location,
                      tbl_reports.msg_exptype AS Exposure_Type,messages.report_date
                      AS report_date,tbl_patientdetails.p_mobile AS Mobile_number,
                      tbl_patientdetails.names AS HCW_Name,tbl_patientdetails.gender AS gender,
                      cadres.name AS cadre,tbl_master_facility.name
                      AS facility,tbl_county.name AS county, tbl_sub_county.name AS sub_county
                      FROM tbl_reports
                      INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile
                      INNER JOIN messages ON messages.mobile=tbl_patientdetails.p_mobile
                      INNER JOIN tbl_reports AS reportstable ON tbl_reports.c_mobile=messages.mobile
                      INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no
                      INNER JOIN cadres_dictionary ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre
                      INNER JOIN cadres ON cadres.level=cadres_dictionary.cadre_id
                      INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id
                      INNER JOIN tbl_sub_county ON tbl_sub_county.id =  tbl_master_facility.Sub_County_ID
                      WHERE tbl_master_facility.Sub_County_Id='$session'
                      group BY tbl_patientdetails.p_mobile";
        return $this->db->query($query)->result_array();
    }

    function getReportsExposureChartsFacility() {
        $session = $_SESSION['facility_id'];
        $query = "SELECT tbl_reports.exposure_date AS exposure_date,tbl_reports.datetime AS
                      Report_date,tbl_reports.location AS Exposure_Location,
                      tbl_reports.msg_exptype AS Exposure_Type,messages.report_date
                      AS report_date,tbl_patientdetails.p_mobile AS Mobile_number,
                      tbl_patientdetails.names AS HCW_Name,tbl_patientdetails.gender AS gender,
                      cadres.name AS cadre,tbl_master_facility.name
                      AS facility,tbl_county.name AS county, tbl_sub_county.name AS sub_county
                      FROM tbl_reports
                      INNER JOIN tbl_patientdetails ON tbl_patientdetails.p_mobile=tbl_reports.c_mobile
                      INNER JOIN messages ON messages.mobile=tbl_patientdetails.p_mobile
                      INNER JOIN tbl_reports AS reportstable ON tbl_reports.c_mobile=messages.mobile
                      INNER JOIN tbl_master_facility ON tbl_master_facility.code=tbl_patientdetails.mfl_no
                      INNER JOIN cadres_dictionary ON cadres_dictionary.specified_cadre=tbl_patientdetails.cadre
                      INNER JOIN cadres ON cadres.level=cadres_dictionary.cadre_id
                      INNER JOIN tbl_county ON tbl_county.id = tbl_master_facility.county_id
                      INNER JOIN tbl_sub_county ON tbl_sub_county.id =  tbl_master_facility.Sub_County_ID
                      WHERE tbl_master_facility.code='$session'
                      group BY tbl_patientdetails.p_mobile";
        return $this->db->query($query)->result_array();
    }

    function getCountyReports() {
        $session = $_SESSION['county_id'];
        $query = "SELECT tbl_patientdetails.names as patient, tbl_reports.datetime, tbl_reports.exposure_date, "
                . "tbl_reports.exposure_hours, tbl_reports.msg_exptype, tbl_reports.location, "
                . "tbl_patientdetails.names as name, tbl_patientdetails.cadre, tbl_patientdetails.pf_attach,"
                . "tbl_patientdetails.gender from tbl_reports inner join"
                . " tbl_patientdetails on tbl_patientdetails.p_id = tbl_reports.p_id  inner join "
                . "tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.mfl_no WHERE "
                . "tbl_master_facility.county_id = '$session'";
        return $this->db->query($query)->result_array();
    }

    function getCountyPatients() {
        $session = $_SESSION['county_id'];
        $query = "SELECT tbl_patientdetails.names, tbl_patientdetails.national_Id, tbl_patientdetails.gender,
                tbl_patientdetails.cadre, tbl_patientdetails.date_admitted, tbl_patientdetails.pf_attach as
                facility_name,tbl_sub_county.name as sub_county  from tbl_patientdetails inner join
                tbl_master_facility on tbl_master_facility.code
                = tbl_patientdetails.mfl_no inner join tbl_sub_county on tbl_sub_county.id =
                tbl_master_facility.Sub_County_ID WHERE tbl_master_facility.county_id='$session'";
        return $this->db->query($query)->result_array();
    }

//    function getSubCountyPatients() {
//        $session = $_SESSION['sub_county_id'];
//        $query = "SELECT tbl_patientdetails.names, tbl_patientdetails.national_Id, tbl_patientdetails.gender, "
//                . "tbl_patientdetails.cadre, tbl_patientdetails.date_admitted, tbl_patientdetails.pf_attach as "
//                . "facility_name from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code "
//                . "= tbl_patientdetails.mfl_no WHERE tbl_master_facility.Sub_County_ID='$session'";
//        return $this->db->query($query)->result_array();
//    }

//    function getSubCountyPatientsbroadcast() {
//       // $session = $_SESSION['sub_county_id'];
//        $query = "SELECT * FROM tbl_cadre";
//        return $this->db->query($query)->result_array();
//    }

    function getSubCountyReports() {
        $session = $_SESSION['sub_county_id'];
        $query = "SELECT tbl_patientdetails.names as patient, tbl_reports.datetime, tbl_reports.exposure_date, "
                . "tbl_reports.exposure_hours, tbl_reports.msg_exptype, tbl_reports.location, "
                . "tbl_patientdetails.names as name, tbl_patientdetails.cadre, tbl_patientdetails.pf_attach,"
                . "tbl_patientdetails.gender from tbl_reports inner join"
                . " tbl_patientdetails on tbl_patientdetails.p_id = tbl_reports.p_id  inner join "
                . "tbl_master_facility on tbl_master_facility.code = tbl_patientdetails.mfl_no WHERE "
                . "tbl_master_facility.Sub_County_ID = '$session'";
        return $this->db->query($query)->result_array();
    }

    function Set_session($id) {
        $this->db->trans_start();
        $get_user_details = $this->db->get_where('staffdetails', array('id' => $id))->result();
        foreach ($get_user_details as $value) {
            $name = $value->user_name;
            $facility_id = $value->facility;
            $county_id = $value->county;
            $sub_county_id = $value->sub_county;
            $user_level = $value->user_level;
            $status = $value->status;

            $newsession = array(
                'user_id' => $id,
                'name' => $name,
                'logged_in' => TRUE,
                'status' => $status,
                'user_level' => $user_level
            );

            $this->session->set_userdata($newsession);

            $get_county_name = $this->db->get_where('county', array('id' => $county_id))->result();
            //initialize session data for a partner user
            foreach ($get_county_name as $county_name) {
                $county = $county_name->name;


                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'county' => $county,
                    'logged_in' => TRUE,
                    'status' => $status,
                    'user_level' => $user_level,
                    'county_id' => $county_id
                );

                $this->session->set_userdata($newsession);
            }

            $get_sub_county_name = $this->db->get_where('sub_county', array('id' => $sub_county_id))->result();
            //initialize session data for a partner user
            foreach ($get_sub_county_name as $sub_county_name) {
                $sub_county = $sub_county_name->name;


                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'sub_county' => $sub_county,
                    'logged_in' => TRUE,
                    'status' => $status,
                    'user_level' => $user_level,
                    'county_id' => $county_id,
                    'sub_county_id' => $sub_county_id
                );

                $this->session->set_userdata($newsession);
            }

            $get_facility_name = $this->db->get_where('master_facility', array('code' => $facility_id))->result();
            //initialize session data for a partner user
            foreach ($get_facility_name as $facility_name) {
                $facility = $facility_name->name;


                $newsession = array(
                    'user_id' => $id,
                    'name' => $name,
                    'facility' => $facility,
                    'logged_in' => TRUE,
                    'status' => $status,
                    'user_level' => $user_level,
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

    function check_auth() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');


        if (filter_var($username)) {

            $check_existence = $this->db->get_where('staffdetails', array('username' => $username))->num_rows();
            $get_user_pass = $this->db->get_where('staffdetails', array('username' => $username))->result_array();
        }


        if ($check_existence === 1) {


            foreach ($get_user_pass as $value) {
                $pass = $value['user_mobile'];
                $id = $value['id'];
                #$facility_id = $value['facility_id'];
                #$crypted_pass = crypt($password, $value['password']);

                if ($password === $pass) {
                    $this->Set_session($id);
                    #$this->Set_session($facility_id);


                    return 'Login success';
                } else {
                    return 'Wrong password...';
                }
            }
        } else {
            return'User does not exist...';
        }
    }

    function check_username($username) {
        return $this->db->get_where('staffdetails', array('username' => $username))->result_array();
    }

    function check_email($username) {
        return $this->db->get_where('staffdetails', array('username' => $username))->result_array();
    }

}

//Commented fn for cadre ditionary quer
//       function getPatients() {//All the HCWs
//        $queryone = "update tbl_patientdetails SET gender='Female' WHERE gender='2'";
//        $querytwo = "update tbl_patientdetails SET gender='Male' WHERE gender='1'";
//        $querythree = "update tbl_patientdetails SET cadre='Doctor' WHERE cadre='Doctor' ";
//        $query1 = $this->db->query($queryone);
//        $query2 = $this->db->query($querytwo);
//        $query3 = $this->db->query($querythree);
//
//
//        if ($_SESSION['user_level'] <= 2) {
//            $query = "SELECT tbl_patientdetails.names, tbl_patientdetails.national_Id, tbl_patientdetails.gender, "
//                    . "tbl_patientdetails.cadre,cadres_dictionary.name,tbl_patientdetails.date_admitted,tbl_master_facility.name as"
//                    . " facility_name, tbl_county.name as county, tbl_sub_county.name as sub_county from "
//                    . "tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code = "
//                    . "tbl_patientdetails.mfl_no inner join tbl_county on tbl_county.id = tbl_master_"
//                    . "facility.county_id inner join tbl_sub_county on tbl_sub_county.id ="
//                    . " tbl_master_facility.Sub_County_ID INNER JOIN cadres_dictionary on cadres_dictionary."
//                    . "user_specified_cadre=tbl_patientdetails.cadre";
//            return $this->db->query($query)->result_array();
//        }
//    }

//    function getSubCountyPatientsbroadcast() {
//        $session = $_SESSION['sub_county_id'];
//        $query = "SELECT tbl_patientdetails.names, tbl_patientdetails.national_Id, tbl_patientdetails.gender, "
//                . "tbl_patientdetails.cadre, tbl_patientdetails.date_admitted, tbl_patientdetails.pf_attach as "
//                . "facility_name from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code "
//                . "= tbl_patientdetails.mfl_no WHERE tbl_master_facility.Sub_County_ID='$session' group by tbl_patientdetails.cadre";
//        return $this->db->query($query)->result_array();
//    }
//    function getSubCountyPatientsbroadcast() {
//        $session = $_SESSION['sub_county_id'];
//        $query = "SELECT tbl_patientdetails.names, "
//                . "tbl_patientdetails.cadre as HCWcadre,tbl_patientdetails.date_admitted, tbl_patientdetails.pf_attach as "
//                . "facility_name from tbl_patientdetails inner join tbl_master_facility on tbl_master_facility.code "
//                . "= tbl_patientdetails.mfl_no "
//                . "inner join tbl_patientdetails on tbl_patientdetails.cadre=cadres_dictionary.user_specified_cadre "
//                . " WHERE tbl_master_facility.Sub_County_ID='$session' "
//                . "";
//        return $this->db->query($query)->result_array();
//    }
