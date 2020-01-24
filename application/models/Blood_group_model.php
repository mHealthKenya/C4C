<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Blood_group_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_blood_group() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');

        $query = $this->db->query("SELECT name FROM blood_group where name='$name' LIMIT 1");
        $row = $query->row();
        $checked_blood_group = $row->name;
       
        if (empty($checked_blood_group)) {
            $date_added = date("Y-m-d H:i:s");
            echo 'Data passed : <br> Name :  ' . $name . '<br> Status : ' . $status . '<br> Date Added : ' . $date_added . '<br>';
            $data_insert = array(
                'name' => $name,
                'status' => $status,
                'date_added' => $date_added
            );
            $this->db->insert('blood_group', $data_insert);
        } else {
              //echo 'Blood group found ...' . $checked_blood_group . '<br>';
            return FALSE;
        }



        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function get_blood_group_info($id) {
        return $this->db->get_where('blood_group', array('id' => $id))->result_array();
    }

    function get_blood_group_name($name) {
        return $this->db->get_where('blood_group', array('name' => $name))->result_array();
    }

    function edit_blood_group() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $data_update = array(
            'name' => $name,
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('blood_group', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_blood_group() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('blood_group', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
