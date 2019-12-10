<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Upload_csv extends CI_Model {

   

    function get_results() {
        $query = $this->db->get('result');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function insert_csv($data) {
        $this->db->insert('result', $data);
    }

}

/*END OF FILE*/

