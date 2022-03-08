<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Auth extends CI_Controller
{



    //LOGIN
    public function login()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        //Checking Request Method

        if ($method != "POST") 
        {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } 
            else 
            {
            $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) 
                {
                $params = $_REQUEST;

                $username = $params['UserName'];
                $password = $params['Password'];

                $response= $this->AuthModel->login($username, $password);
                json_output($response['status'],$response);

               }
            }
    }
}