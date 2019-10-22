<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Clinic_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_clinic() {
        $this->db->trans_start();
        $name = $this->input->post('clinic_name');
        $status = $this->input->post('status');
        $county_name = $this->input->post('county_name');
        $recruiter = $this->input->post('recruiter');
        $venue = $this->input->post('venue');
        $contact = $this->input->post('contact');
        $date_added = date("Y-m-d H:i:s");
        //echo 'Data passed : <br> Name :  ' . $name . '<br> Status : ' . $status . '<br> Date Added : ' . $date_added . '<br>';
        $data_insert = array(
            'name' => $name,
            'status' => $status,
            'date_added' => $date_added,
            'recruiter' => $recruiter,
            'county_id' => $county_name,
            'contact' => $contact,
            'venue' => $venue
        );
        $this->db->insert('clinic', $data_insert);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function get_clinic_info($id) {

        return $this->db->get_where('clinic_view', array('clinic_id' => $id))->result_array();
    }

    function edit_clinic() {
        $this->db->trans_start();
        $name = $this->input->post('edit_clinic_name');
        $status = $this->input->post('edit_status');
        $id = $this->input->post('edit_clinic_id');

        $county_name = $this->input->post('edit_county_name');
        $recruiter = $this->input->post('edit_recruiter');
        $venue = $this->input->post('edit_venue');
        $contact = $this->input->post('edit_contact');
        echo 'Data : clinic name : ' . $name . '<br> Status ' . $status . '<br> Id : ' . $id . '<br> County name' . $county_name . '<br>Recruiter' . $recruiter . '<br> Venue : ' . $venue . '<br>Contact ' . $contact;
        $data_update = array(
            'name' => $name,
            'status' => $status,
            'recruiter' => $recruiter,
            'county_id' => $county_name,
            'contact' => $contact,
            'venue' => $venue
        );
        $this->db->where('id', $id);
        $this->db->update('clinic', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_clinic() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('clinic', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
