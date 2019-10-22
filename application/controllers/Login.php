<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {

    public $data = '';

    function __construct() {
        parent::__construct();
        $this->data = new DBCentral();
    }

    function index() {

        $view = 'Login';
        $this->load->view($view);
    }

    function check_auth() {
        $validate_user = $this->data->check_auth();
        $login_success = "Login success";
        $invalid_user = "User does not exist";
        $wrong_password = "Wrong password";
        $inactive = "User is deactivated";
        if ($validate_user === $login_success) {

            echo "Login Success";
        } elseif ($validate_user === $invalid_user) {
            echo "Invalid User";
        }
         elseif ($validate_user === $inactive) {
            echo "Account Inactive";
        }  elseif ($validate_user === $wrong_password) {
            echo "Wrong Password";
        }
    }

    
function reset() {
        $view = 'reset_password';
        $this->load->view($view);
    }


function reset_password() {
        // echo "inside login reset_password";
        $reset_p = $this->data->reset_password();

        $reset_success = "Email Sent";
        $reset_unseccessful = "Reset Unsucessful";
        $wrong_email = "Wrong Email";
        if ($reset_p == $reset_success) {

            echo "Reset Successful!!";

        } elseif ($reset_p == $reset_unseccessful) {
            
            echo "Recover failed!!";
        } elseif ($reset_p == $wrong_email) {
            
            echo "Email does not exist!!";
        }
    }



function password_reset() {
        // echo "inside login reset_password";
        $reset_p = $this->data->password_reset();

        $reset_success = "Reset Success";
        $reset_unseccessful = "Reset Unsucessful";
        $wrong_email = "Wrong Email";
        if ($reset_p == $reset_success) {

            echo "Reset Successful!!";
            
        } elseif ($reset_p == $reset_unseccessful) {
            
            echo "Recover failed!!";
        } elseif ($reset_p == $wrong_email) {
            
            echo "Email does not exist!!";
        }
    }


    function Logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}
