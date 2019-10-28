<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class t4l_DBCentral extends CI_Model {

    function getData() {
        return $this->db->get('donor')->result();
    }

}
