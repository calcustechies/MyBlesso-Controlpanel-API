<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    //Display User Details

    public function displayUserDetails($userDetailsID,$userType)  
     
    {
        $method = $_SERVER['REQUEST_METHOD'];
    
        //Checking Request Method
        if ($method != 'GET') 
        {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } else {
    
            $this->load->model('AuthModel');
    
                $check_auth_client = $this->AuthModel->check_auth_client();
    
                //Checking Root Code is True Or Not
                if ($check_auth_client == true) 
                    {
                    $params = $_REQUEST;
    
    
                    $this->load->model('UsersModel');
    
    
                    $resp['details'] = $this->UsersModel->viewUserDetails($userDetailsID,$userType);
                    $result = $resp['details']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success', 'UsersDetails' => $result));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }

    }



    //Display Root Profile

    public function displayRootProfile($rootID)  
     
    {
        $method = $_SERVER['REQUEST_METHOD'];
    
        //Checking Request Method
        if ($method != 'GET') 
        {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } else {
    
            $this->load->model('AuthModel');
    
                $check_auth_client = $this->AuthModel->check_auth_client();
    
                //Checking Root Code is True Or Not
                if ($check_auth_client == true) 
                    {
                    $params = $_REQUEST;
    
    
                    $this->load->model('UsersModel');
    
    
                    $resp['details'] = $this->UsersModel->viewRootProfile($rootID);
                    $result = $resp['details']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success', 'RootProfile:' => $result));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }

    }

//Display User Details Filter
public function userDetailsFilter($userGender, $userDistrict, $userState, $userExp, $userRating, $userType, $userskill, $userCat, $page_no, $page_limit)
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

            $this->load->model('UsersModel');

            $resp['userDetails'] = $this->UsersModel->userFiltered($userGender, $userDistrict, $userState, $userExp, $userRating, $userType, $userskill, $userCat, $page_no, $page_limit);
            $result = $resp['userDetails']->result_array();

            $data = json_output(200, array('status' => '200', 'message' => 'success', 'DisplayUserDetails' => $result));
            echo $data;
        } else {

            return array('status' => '401', 'message' => 'Incorrect Last Id');
        }
    }
}



//Display User Details Filter Count
public function userDetailsFilterCount($userType)
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

            $this->load->model('UsersModel');

            $resp['userDetailsCount'] = $this->UsersModel->userFilteredCount($userType);
            $result = $resp['userDetailsCount']->result_array();

            $data = json_output(200, array('status' => '200', 'message' => 'success', 'DisplayUserDetailsCount' => $result));
            echo $data;
        } else {

            return array('status' => '401', 'message' => 'Incorrect Last Id');
        }
    }
}






}
?>