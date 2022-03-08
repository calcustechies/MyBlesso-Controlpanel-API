<?php
defined('BASEPATH') or exit('No direct script access allowed');


class CashFlow extends CI_Controller
{

    //Display System Cash Flow (e-wallet 'client')    
    public function eWallet($ID, $userID, $methods)
    {

        $method = $_SERVER['REQUEST_METHOD'];

        //Checking Request Method

        if ($method != 'GET') {
            json_output(400, array('status' => '400', 'message' => 'Bad request'));
        } else {
            $this->load->model('AuthModel');

            $check_auth_client = $this->AuthModel->check_auth_client();

            //Checking Root Code is True Or Not
            if ($check_auth_client == true) {
                $params = $_REQUEST;


                $this->load->model('CashFlowModel');


                $resp['cashFlow'] = $this->CashFlowModel->displayEWallet($ID, $userID, $methods);
                $result = $resp['cashFlow']->result_array();

                $data = json_output(200, array('status' => '200', 'message' => 'success', 'EWallet' => $result));
                echo $data;
            } else {

                return array('status' => '401', 'message' => 'Incorrect Last Id');
            }
        }
    }

    //Display System Cash Flow Admin
  public function adminCashFlow($walletID, $fromUserID, $toUserID,$meathod)
  {


      $method = $_SERVER['REQUEST_METHOD'];

      //Checking Request Method

      if ($method != 'GET') {
          json_output(400, array('status' => '400', 'message' => 'Bad request'));
      } else {
          $this->load->model('AuthModel');

          $check_auth_client = $this->AuthModel->check_auth_client();

          //Checking Root Code is True Or Not
          if ($check_auth_client == true) {
              $params = $_REQUEST;


              $this->load->model('CashFlowModel');


              $resp['cashFlow'] = $this->CashFlowModel->displaySystemCashFlowAdmin($walletID, $fromUserID, $toUserID, $meathod);
              $result = $resp['cashFlow']->result_array();

              $data = json_output(200, array('status' => '200', 'message' => 'success', 'CashFlowAdmin' => $result));
              echo $data;
          } else {

              return array('status' => '401', 'message' => 'Incorrect Last Id');
          }
      }
  }


}
