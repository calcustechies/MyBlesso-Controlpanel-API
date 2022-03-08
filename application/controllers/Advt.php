<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Advt extends CI_Controller
{

//Manage Advertisement
public function manage()
{
    $method = $_SERVER['REQUEST_METHOD'];

    //Checking Request Method
    if ($method != 'POST') 
    {
        json_output(400, array('status' => '400', 'message' => 'Bad request.'));
    } else {

        $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) 
                {
                $params = $_REQUEST;

                $advtId = $params['advertisementId'];
                $userId =$params['userId'];
                $advtImage = $params['advertisementImage'];
                $advtTitle = $params['advertisementTitle'];
                $advtTitleDescription = $params['advertisementTitleDescription'];
                $advtLink = $params['advertisementLink'];

                $this->load->model('AdvtModel');


                $resp['manageAdvt'] = $this->AdvtModel->manage($advtId, $userId,$advtImage,$advtTitle,$advtTitleDescription,$advtLink);
                $result = $resp['manageAdvt']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'Advt' => $result));
                echo $data;
                }
                else{

                    return array('status' => '401', 'message' => 'Incorrect Last Id');
                }

        }


}

   

    //View Advertisement

    public function viewAdvertisement($userId,$advtId,$clientView)
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
    
                  /*  
                    $userId =$params['userId'];
                    $advtId = $params['advertisementId'];
                    $clientView=$params['ClientView'];
                    */
    
                    $this->load->model('AdvtModel');
    
    
                    $resp['viewAdvt'] = $this->AdvtModel->viewAdvertis($userId,$advtId,$clientView);
                    $result = $resp['viewAdvt']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success', 'Advt' => $result));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }
    
    
    }

   //Freeze Advertisement

    public function freezeAdvertisement($advertisementId,$fzValue)
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
    
                  
    
                    $this->load->model('AdvtModel');
    
    
                    $resp['freezeAdvt'] = $this->AdvtModel->freezeAdvertis($advertisementId,$fzValue);
                   // $result = $resp['freezeAdvt']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success'));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }
    
    
    }

// Delete  Advertisement
public function deleteAdvertisement($advertisementId)
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

              

                $this->load->model('AdvtModel');


                $resp['deleteAdvt'] = $this->AdvtModel->deleteAdvertis($advertisementId);
               // $result = $resp['freezeAdvt']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success'));
                echo $data;
                }
                else{

                    return array('status' => '401', 'message' => 'Incorrect Last Id');
                }

        }


}

}
