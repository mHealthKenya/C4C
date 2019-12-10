<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stockusers extends CI_Model {


    function add_stockuser() {
        $this->db->trans_start();
        $satellite_name = $this->input->post('satellite_name');
        $mobile_no = $this->input->post('mobile_no');
       
        
        $data_insert = array(
            'satellite_name' => $satellite_name,
            'mobile_no' => $mobile_no,
            
        );
        $this->db->insert('rbtc_facilities', $data_insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function cryptPass($input, $rounds = 9) {
        $salt = "";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++):
            $salt.=$saltChars[array_rand($saltChars)];
        endfor;
        return crypt($input, sprintf("$2y$%02d$", $rounds) . $salt);
    }

    function get_stockuser_info($id) {
        return $this->db->get_where('stock', array('id' => $id))->result_array();
    }

    function edit_stockuser() {
        $this->db->trans_start();
        $satellite_name = $this->input->post('satellite_name');
        $mobile_no = $this->input->post('mobile_no');
        
        echo 'Data passed : ' . $satellite_name . $mobile_no  . '<br>';
        $data_update = array(
            'satellite_name' => $satellite_name,
            'mobile_no' => $mobile_no,
            'status' => $status,
            
        );
        $this->db->where('id', $user_id);
        $this->db->update('stock', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_stockuser() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('stock', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
