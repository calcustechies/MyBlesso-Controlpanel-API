<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{




  //Display Bank Details 
public function displayBankDetails($userid)
{
    $method = $_SERVER['REQUEST_METHOD'];

    //Checking Request Method
    if ($method != 'GET') {
        json_output(400, array('status' => '400', 'message' => 'Bad request.'));
    } else {

        $this->load->model('AuthModel');

        $check_auth_client = $this->AuthModel->check_auth_client();

        //Checking Root Code is True Or Not
        if ($check_auth_client == true) {
            $params = $_REQUEST;


            $this->load->model('BankModel');


            $resp['bankDetails'] = $this->BankModel->viewBankDetails($userid);
            $result = $resp['bankDetails']->result_array();

            $data = json_output(200, array('status' => '200', 'message' => 'success', 'DisplayBankDetails' => $result));
            echo $data;
        } else {

            return array('status' => '401', 'message' => 'Incorrect Last Id');
        }
    }
}





}