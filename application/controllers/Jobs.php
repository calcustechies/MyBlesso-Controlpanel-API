<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends CI_Controller
{
    //Display Posted Jobs With Filter
    public function displayJobs($JobCat, $JobType, $JobPostDistrictID, $JobPostStateID, $JobPostedBY, $JobPostID, $page_no, $page_limit)
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


                $this->load->model('JobModel');


                $resp['displayJobs'] = $this->JobModel->postedJobs($JobCat, $JobType, $JobPostDistrictID, $JobPostStateID, $JobPostedBY, $JobPostID, $page_no, $page_limit);
                $result = $resp['displayJobs']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'DisplayJobs' => $result));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }


    //Post and Manage Jobs

    public function manageJobs()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        //Checking Request Method
        if ($method != 'POST') {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } else {

            $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) {
                $params = $_REQUEST;

                $JobPostID = $params['JobPostID'];
                $JobPostTitle = $params['JobPostTitle'];
                $JobPostType = $params['JobPostType'];
                $JobPostCat = $params['JobPostCat'];
                $JobPostMinSalary = $params['JobPostMinSalary'];
                $JobPostMaxSalary = $params['JobPostMaxSalary'];
                $JobPostMinExp = $params['JobPostMinExp'];
                $JobPostMaxExp = $params['JobPostMaxExp'];
                $JobPostDistrictID = $params['JobPostDistrictID'];
                $JobPostLocality = $params['JobPostLocality'];
                $JobPostStateID = $params['JobPostStateID'];
                $JobPostCountryID = $params['JobPostCountryID'];
                $JobPostDescription = $params['JobPostDescription'];
                $JobPostHiringFor = $params['JobPostHiringFor'];
                $JobPostContactEmail = $params['JobPostContactEmail'];
                $JobPostContactPhone = $params['JobPostContactPhone'];
                $JobPostContactAddress = $params['JobPostContactAddress'];
                $JobPostedBY = $params['JobPostedBY'];
                $jobIMG = $params['jobIMG'];

                $this->load->model('JobModel');


                $resp['manageJobs'] = $this->JobModel->manageJobs($JobPostID, $JobPostTitle, $JobPostType, $JobPostCat, $JobPostMinSalary, $JobPostMaxSalary, $JobPostMinExp, $JobPostMaxExp, $JobPostDistrictID, $JobPostLocality, $JobPostStateID, $JobPostCountryID, $JobPostDescription, $JobPostHiringFor, $JobPostContactEmail, $JobPostContactPhone, $JobPostContactAddress, $JobPostedBY, $jobIMG);


                $result = $resp['manageJobs']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'PostandManage' => $result));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }



    //Display Job Categories 


    public function jobCategory($jobCategoryID)
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


                $this->load->model('JobModel');


                $resp['category'] = $this->JobModel->jobcategories($jobCategoryID);
                $result = $resp['category']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'JobCategories' => $result));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }



    //Search Jobs
    public function searchJobs()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        //Checking Request Method
        if ($method != 'POST') {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } else {

            $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) {
                $params = $_REQUEST;

                $SearchText = $params['SearchText'];
                $JobPostCat = $params['JobPostCat'];
                $JobPostType = $params['JobPostType'];
                $JobPostMinSalary = $params['JobPostMinSalary'];
                $JobPostMaxSalary = $params['JobPostMaxSalary'];
                $JobPostStateID = $params['JobPostStateID'];
                $JobPostDistrictID = $params['JobPostDistrictID'];
                $page_no = $params['page_no'];
                $page_limit = $params['page_limit'];
                $userpin = $params['userpin'];
                
                
               

                $this->load->model('JobModel');


                $resp['jobSearch'] = $this->JobModel->jobSearch($SearchText,$JobPostCat,$JobPostType,$JobPostMinSalary,$JobPostMaxSalary,$JobPostStateID,$JobPostDistrictID,$page_no,$page_limit,$userpin);


                $result = $resp['jobSearch']->result_array();
                // $resp['jobSearch']->next_result();
                
                // $resp['jobCount'] = $this->JobModel->jobcount($SearchText,$JobPostCat,$JobPostType,$JobPostMinSalary,$JobPostMaxSalary,$JobPostStateID,$JobPostDistrictID,$userpin);
                
                // $result2 = $resp['jobCount']->result_array();
                
                // foreach($resp['jobCount']->result_array() as $row){
                //     $c = $row['count'];
                // }
                
                // $co = ceil(floatval($c)/10);
                
                $data = json_output(200, array('status' => '200', 'message' => 'success', 'SearchJobs' => $result));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }



    //DealWithAJobReply

    public function dealJobReply($replyID)
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


                $this->load->model('JobModel');


                $resp['deal'] = $this->JobModel->dealReply($replyID);
               // $result = $resp['deal']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success'));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }


    //Pay For A Job
    public function payment()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        //Checking Request Method
        if ($method != 'POST') {
            json_output(400, array('status' => '400', 'message' => 'Bad request.'));
        } else {

            $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) {
                $params = $_REQUEST;

                $PayedAmount = $params['PayedAmount'];
                $replyID = $params['replyID'];
               


                $this->load->model('JobModel');


                $resp['payForJobs'] = $this->JobModel->payJob($PayedAmount, $replyID);


                //$result = $resp['payForJobs']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success'));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }


   // Complete a deal


   public function completeaDeal($replyID)
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


               $this->load->model('JobModel');


               $resp['dealCompleted'] = $this->JobModel->dealComplete($replyID);
               // $result = $resp['dealCompleted']->result_array();

               $data = json_output(200, array('status' => '200', 'message' => 'success',));
               echo $data;
           } else {

               return array('status' => '401', 'message' => 'Incorrect Last Id');
           }
       }
   }

  //Manage Job Rating

  public function manageJobRating()
  {
      $method = $_SERVER['REQUEST_METHOD'];

      //Checking Request Method
      if ($method != 'POST') {
          json_output(400, array('status' => '400', 'message' => 'Bad request.'));
      } else {

          $this->load->model('AuthModel');

          $check_auth_client = $this->AuthModel->check_auth_client();

          //Checking Root Code is True Or Not
          if ($check_auth_client == true) {
              $params = $_REQUEST;

              $jobID = $params['jobID'];
              $userID = $params['userID'];
              $Rating = $params['Rating'];
              $RatingID = $params['RatingID'];
             
             
              $this->load->model('JobModel');


              $resp['manageJobsRating'] = $this->JobModel->manageJobRate($jobID,$userID,$Rating,$RatingID);


              $r = $resp['manageJobsRating']->result_array();
             

              foreach ($r as $row) {
                $manageJobsRating = $row['@lid'];
            }
            json_output(200, array('status' => '200', 'message' => 'success', 'manageJobsRatingID' => $r,));
             // $data = json_output(200, array('status' => '200', 'message' => 'success'));
            //  echo $data;
          } else {

              return array('status' => '401', 'message' => 'Incorrect Last Id');
          }
      }
  }
// Manage job Comment 
public function manageJobComment()
  {
      $method = $_SERVER['REQUEST_METHOD'];

      //Checking Request Method
      if ($method != 'POST') {
          json_output(400, array('status' => '400', 'message' => 'Bad request.'));
      } else {

          $this->load->model('AuthModel');

          $check_auth_client = $this->AuthModel->check_auth_client();

          //Checking Root Code is True Or Not
          if ($check_auth_client == true) {
              $params = $_REQUEST;

              $commentID = $params['commentID'];
              $jobID = $params['jobID'];
              $repliedBY = $params['repliedBY'];
              $comment = $params['comment'];
              $commentedForCommentID = $params['commentedForCommentID'];
             

             
              $this->load->model('JobModel');


              $resp['manageJobComment'] = $this->JobModel->manageJobComments($commentID,$jobID,$repliedBY,$comment,$commentedForCommentID);


              $r = $resp['manageJobComment']->result_array();
             

              foreach ($r as $row) {
                $manageJobComment = $row['@lid'];
            }
            json_output(200, array('status' => '200', 'message' => 'success', 'manageJobComment' => $r,));
             // $data = json_output(200, array('status' => '200', 'message' => 'success'));
            //  echo $data;
          } else {

              return array('status' => '401', 'message' => 'Incorrect Last Id');
          }
      }
  }
// Display job comment

public function displayJobComment()
  {
      $method = $_SERVER['REQUEST_METHOD'];

      //Checking Request Method
      if ($method != 'POST') {
          json_output(400, array('status' => '400', 'message' => 'Bad request.'));
      } else {

          $this->load->model('AuthModel');

          $check_auth_client = $this->AuthModel->check_auth_client();

          //Checking Root Code is True Or Not
          if ($check_auth_client == true) {
              $params = $_REQUEST;

              $commentID = $params['commentID'];
              $commentedForCommentID = $params['commentedForCommentID'];
              $jobID = $params['jobID'];
              $repliedBY = $params['repliedBY'];
             
              $this->load->model('JobModel');

              $resp['displayJobComments'] = $this->JobModel->displayJobComments($commentID,$commentedForCommentID,$jobID,$repliedBY);


              $r = $resp['displayJobComments']->result_array();
             

             
         $data =  json_output(200, array('status' => '200', 'message' => 'success','DisplayJobComments'=>$r));
            echo $data;
          } else {

              return array('status' => '401', 'message' => 'Incorrect Last Id');
          }
      }
  }

  


//Job Cat Upsert

  public function jobCatUpsert()  
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
                  $jobCategoryName = $params['jobCategoryName'];
                  $jobCategoryAddedBY  = $params['jobCategoryAddedBY'];
                  $jobCatImg  = $params['jobCatImg'];
                  $jobCategoryID = $params['jobCategoryID'];
                 
                  $this->load->model('JobModel');
                  $resp['upsert'] = $this->JobModel->catUpsert($jobCategoryName,$jobCategoryAddedBY,$jobCatImg,$jobCategoryID);
                  $result = $resp['upsert']->result_array();
                  foreach($result as $row)
                  {
                  $lid= $row['@lid'];
                  }
                  $data = json_output(200, array('status' => '200', 'message' => 'success', 'lid' => $lid));
                  echo $data;
                  }
                  else{
                      return array('status' => '401', 'message' => 'Incorrect Last Id');
                  }
  
          }

  }


//Freeze Or Unfreeze Job Cat 

public function freezeOrUnfreezeJobCat($jobCategoryID,$fz )
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

                $this->load->model('JobModel');


                $resp['freeze'] = $this->JobModel->freezeOrUnfreeze($jobCategoryID,$fz);
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
?>