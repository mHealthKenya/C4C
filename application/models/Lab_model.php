<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Lab_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_lab() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $date_added = date("Y-m-d H:i:s");
        

        $query = $this->db->query("SELECT name FROM tbl_lab where name='$name' LIMIT 1");
        $row = $query->row();
        $checked_lab_name = $row->name;
        
        if (empty($checked_lab_name)) {
            echo 'Insert';
            $data_insert = array(
                'name' => $name,
                'status' => $status,
                'date_added' => $date_added
            );
            $this->db->insert('lab', $data_insert);
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

    function get_lab_info($id) {
        return $this->db->get_where('lab', array('id' => $id))->result_array();
    }

    function edit_lab() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $data_update = array(
            'name' => $name,
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('lab', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_lab() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('lab', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
