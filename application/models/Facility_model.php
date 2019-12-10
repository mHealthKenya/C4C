<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Facility_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_facility() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $mfl_code = $this->input->post('mfl_code');
        $mobile = $this->input->post('mobile_no');
        $county = $this->input->post('county_name');
        $partner_id = $this->input->post('partner_id');
        $lab_id = $this->input->post('lab_id');

        $date_added = date("Y-m-d H:i:s");


        $query = $this->db->query("SELECT name FROM tbl_facilities where name='$name' LIMIT 1");
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
                'partner_id'=>$partner_id
            );
            $this->db->insert('tbl_facilities', $data_insert);
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

    function get_facility_info($id) {
        $query = "SELECT tbl_health_facilities.id as facility_id , tbl_health_facilities.name as facility_name, "
                . "tbl_health_facilities.mfl,tbl_health_facilities.mobile,tbl_health_facilities.email,"
                . "tbl_county.id as county_id,tbl_county.name as county_name"
                . " FROM `tbl_health_facilities` inner JOIN tbl_county on tbl_county.id = tbl_health_facilities.county_id"
                . " where tbl_health_facilities.id='$id'";
        $sql = $this->db->query($query)->result_array();
        return $sql;
    }

    function edit_facility() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
        $partner_id = $this->input->post('partner_id');
        $data_update = array(
            'mobile' => $mobile,
            'partner_id' => $partner_id,
            'email' => $email,
            );
        $this->db->where('id', $id);
        $this->db->update('health_facilities', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_facility() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('facility', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


function select_entries_where($table, $where, $items, $order)
    {


        $this->db->select($items);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order, "asc");
        $query = $this->db->get();
        
        return $query->result();
    }

}
