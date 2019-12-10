<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function AddPartnerUser() {
        

        $partner_id = $this->input->post('partnerid');
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $username = $this->input->post('username');
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $user_level = $this->input->post('user_level');
        $password = $this->cryptPass($phone_no);

        $check_phone = $this->db->get_where('tbl_staffdetails', array('user_mobile' => $phone_no))->num_rows();
        $check_uname = $this->db->get_where('tbl_staffdetails', array('username' => $username))->num_rows();
//        $getMOB = $this->db->get_where('tbl_staffdetails', array('phone_no' => $phone_no))->result_array();

        if ($check_phone >= 1) {
            return 'PhoneExists';
        } elseif ($check_uname >= 1) {
            return 'UserExists';
        } elseif ($check_phone == 0 && $check_uname == 0) {

            $data_insert = array(
                'partner_id' => $partner_id,
                'user_name' => $name,
                'username' => $username,
                'user_mobile' => $phone_no,
                'created' => $date_added,
                'status' => $status,
                'password' => $password,
                'user_level' => 6
            );
            $this->db->insert('staffdetails', $data_insert);
            return'Done';
           
        }
    }

    function Supervisor() {
        $this->db->trans_start();

        $SupFacility = $this->input->post('SupFacility');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phone_no = $this->input->post('phone_no');
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $password = $this->cryptPass($phone_no);
        $user_level = $this->input->post('user_level');

        $check_phone = $this->db->get_where('tbl_staffdetails', array('user_mobile' => $phone_no))->num_rows();
        $check_uname = $this->db->get_where('tbl_staffdetails', array('username' => $fname))->num_rows();
//        $getMOB = $this->db->get_where('tbl_staffdetails', array('phone_no' => $phone_no))->result_array();

        if ($check_phone >= 1) {
            return 'PhoneExists';
        } elseif ($check_uname >= 1) {
            return 'UserExists';
        } elseif ($check_phone == 0 && $check_uname == 0) {
            $data_insert = array(
                'facility' => $SupFacility,
                'user_name' => $fname,
                'last_name' => $lname,
                'user_mobile' => $phone_no,
                'created' => $date_added,
                'status' => $status,
                'user_level' => 7
            );
            $this->db->insert('staffdetails', $data_insert);
            return'Done';
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function add_user() {
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $username = $this->input->post('username');
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $user_level = $this->input->post('user_level');
        $password = $this->cryptPass($phone_no);

        $check_phone = $this->db->get_where('tbl_staffdetails', array('user_mobile' => $phone_no))->num_rows();
        $check_uname = $this->db->get_where('tbl_staffdetails', array('username' => $username))->num_rows();
//        $getMOB = $this->db->get_where('tbl_staffdetails', array('phone_no' => $phone_no))->result_array();

        if ($check_phone >= 1) {
            return 'PhoneExists';
        } elseif ($check_uname >= 1) {
            return 'UserExists';
        } elseif ($check_phone == 0 && $check_uname == 0) {
            $data_insert = array(
                'user_name' => $name,
                'username' => $username,
                'user_mobile' => $phone_no,
                'created' => $date_added,
                'status' => $status,
                'password' => $password,
                'user_level' => $user_level + 1
            );

            $this->db->insert('staffdetails', $data_insert);
            return'Done';
            
        }
    }

    function get_broadcast($id) {

        $query = "SELECT id,broadcastname ,msg ,approval_status FROM tbl_sms_broadcast WHERE id = '$id' ";
        return $this->db->query($query)->result();
    }

    function add_nascop_user() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $county = $this->input->post('county');
        $username = $this->input->post('username');
        $password = $this->cryptPass($phone_no);
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $user_level = $this->input->post('user_level');
        $data_insert = array(
            'user_name' => $name,
            'username' => $username,
            'county' => $county,
            'user_mobile' => $phone_no,
            'password' => $password,
            'created' => $date_added,
            'status' => $status,
            'user_level' => $user_level + 1
        );
        $this->db->insert('staffdetails', $data_insert);
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
            $salt .= $saltChars[array_rand($saltChars)];
        endfor;
        return crypt($input, sprintf("$2y$%02d$", $rounds) . $salt);
    }

    function change_pass($id) {
        $this->db->trans_start();
        $confirm = $this->input->post('confirm_new_password');
        $newinsert = $this->cryptPass($confirm);
        $data_update = array(
            'password' => $newinsert,
            'first_login' => 'NO'
        );

        $this->db->where('id', $id);
        $this->db->update('staffdetails', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function add_county_user() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $county = $_SESSION['county_id'];
        $sub_county = $this->input->post('sub_county');
        $username = $this->input->post('username');
        $password = $this->cryptPass($phone_no);
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $user_level = $this->input->post('user_level');
        $data_insert = array(
            'user_name' => $name,
            'username' => $username,
            'county' => $county,
            'password' => $password,
            'sub_county' => $sub_county,
            'user_mobile' => $phone_no,
            'created' => $date_added,
            'status' => $status,
            'user_level' => $user_level + 1
        );
        $this->db->insert('staffdetails', $data_insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function add_sub_county_user() {
        $this->db->trans_start();
        $name = $this->input->post('name');
        $phone_no = $this->input->post('phone_no');
        $county = $_SESSION['county_id'];
        $sub_county = $_SESSION['sub_county_id'];
        $facility = $this->input->post('facility');
        $password = $this->cryptPass($phone_no);
        $username = $this->input->post('username');
        $date_added = date("Y-m-d H:i:s");
        $status = $this->input->post('status');
        $user_level = $this->input->post('user_level');
        $data_insert = array(
            'user_name' => $name,
            'username' => $username,
            'county' => $county,
            'sub_county' => $sub_county,
            'password' => $password,
            'facility' => $facility,
            'user_mobile' => $phone_no,
            'created' => $date_added,
            'status' => $status,
            'user_level' => $user_level + 1
        );
        $this->db->insert('staffdetails', $data_insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit_user() {
        $this->db->trans_start();
        $user_id = $this->input->post('id');
        $name = $this->input->post('name');
        $county = $this->input->post('county');
        $sub_county = $this->input->post('sub_county');
        $facility = $this->input->post('facility');
        $phone_no = $this->input->post('phone_no');
        $status = $this->input->post('status');
        echo 'Data passed : ' . $user_id . $name . $phone_no . $status . $facility . $county . $sub_county . '<br>';
        $data_update = array(
            'user_name' => $name,
            'user_mobile' => $phone_no,
            'county' => $county,
            'sub_county' => $sub_county,
            'facility' => $facility,
            'status' => $status
        );
        $this->db->where('id', $user_id);
        $this->db->update('staffdetails', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete_users() {
        $this->db->trans_start();
        $id = $this->input->post('id');
        $data_delete = array(
            'status' => 'In Active'
        );
        $this->db->where('id', $id);
        $this->db->update('staffdetails', $data_delete);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
