<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Module_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_module() {
        $this->db->trans_start();
        $module = $this->input->post('module');
        $controller = $this->input->post('controller');
        $function = $this->input->post('function');
        $status = $this->input->post('status');
        $date_added = date("Y-m-d H:i:s");
        $level = $this->input->post('level');


        $query = $this->db->query("SELECT function FROM tbl_module where function='$name' LIMIT 1");
        $row = $query->row();
        $checked_module_name = $row->name;

        if (empty($checked_module_name)) {
            echo 'Insert';
            $data_insert = array(
                'module' => $module,
                'status' => $status,
                'date_added' => $date_added,
                'function' => $function,
                'controller' => $controller,
                'level' => $level
            );
            $this->db->insert('module', $data_insert);
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

    function get_module_info($id) {
        return $this->db->get_where('module', array('id' => $id))->result_array();
    }

    function edit_module() {
        $this->db->trans_start();
        $module = $this->input->post('module');
        $controller = $this->input->post('controller');
        $function = $this->input->post('function');
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $level = $this->input->post('level');
        echo 'Values : ' . $module . $function . $controller . $status;
        $data_update = array(
            'module' => $module,
            'function' => $function,
            'controller' => $controller,
            'status' => $status,
            'level' => $level
        );
        $this->db->where('id', $id);
        $this->db->update('module', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_module() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('module', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
