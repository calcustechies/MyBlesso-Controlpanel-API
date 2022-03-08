<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApplyJobs extends CI_Controller
{


   // Apply For Posted Job
   public function applyPostedJobs()
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
    
                    $jobPostID = $params['jobPostID'];           
                    $repliedBY = $params['repliedBY'];
                    $CustomMessage = $params['CustomMessage'];
                    

                    $this->load->model('ApplyJobsModel');
    
    
                    $resp['applyJobs'] = $this->ApplyJobsModel->applyPostedJobs($jobPostID,$repliedBY,$CustomMessage);


                    $result = $resp['applyJobs']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success', 'ApplyforPostedJobs:' => $result));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }
    
    
    }




//Display Job Post Reply

    public function displayJobPostReply($jobPostID,$replyID,$repliedBY)
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
    
    
                    $this->load->model('ApplyJobsModel');
    
    
                    $resp['postReply'] = $this->ApplyJobsModel->viewJobPostReply($jobPostID,$replyID,$repliedBY);
                    $result = $resp['postReply']->result_array();
    
                    $data = json_output(200, array('status' => '200', 'message' => 'success', 'Reply' => $result));
                    echo $data;
                    }
                    else{
    
                        return array('status' => '401', 'message' => 'Incorrect Last Id');
                    }
    
            }

    }


//Display Job Post Reply Filter

public function displayJobPostReplyFilter($jobPostID,$replyID,$repliedBY,$JobPostedBY,$DealIT,$Payed,$DealCompleted)

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


                $this->load->model('ApplyJobsModel');


                $resp['postReply'] = $this->ApplyJobsModel->viewJobPostReplyFilter($jobPostID,$replyID,$repliedBY,$JobPostedBY,$DealIT,$Payed,$DealCompleted);
                $result = $resp['postReply']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'Reply' => $result));
                echo $data;
                }
                else{

                    return array('status' => '401', 'message' => 'Incorrect Last Id');
                }

        }

}

//Display Posted Jobs Total Count ( for pagination)
public function displayPostedJobsTotalCount()
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


                $this->load->model('ApplyJobsModel');


                $resp['pagination'] = $this->ApplyJobsModel->forPagination();
                $result = $resp['pagination']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'Pagination' => $result));
                echo $data;
                }
                else{

                    return array('status' => '401', 'message' => 'Incorrect Last Id');
                }

        }

}





}
?>