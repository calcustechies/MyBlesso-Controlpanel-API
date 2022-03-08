<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthModel extends CI_Model
{

    var $auth_key = "Ck4ZofJ10Ee";

    //CHECKING AUTHENTICATION KEY IS TRUE OR FALSE
    public function check_auth_client()
    {
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);

        if ($auth_key == $this->auth_key) {
            return true;
        } else {
            return json_output(401, array('status' => '401', 'message' => 'Unauthorized.'));
        }
    }


    //CHECKING USERNAME OR PASSWORD CORRECT
    public function login($username, $password)
    {
        $q  = $this->db->query('CALL `RootLogin`("' . $username . '","' . $password . '")');
        //return $result;

        $res = $q->result();
        foreach ($q->result_array() as $row) {
            
            $rootID= $row['@rootID'];
            $rootFirstName = $row['@rootFirstName'];
            $rootLastName= $row['@rootLastName'];
            $rootUserName = $row['@rootUserName'];
            //$rootContactNo = $row['@rootContactNo'];
            $rootLastLogin= $row['@rootLastLogin'];
        }

        //add this two line

        $q->next_result();
        $q->free_result();

        if ($rootID > 0) {

            date_default_timezone_set("Asia/Calcutta");
            $last_login = date('Y-m-d H:i:s');
            $token = crypt('calcusTech', substr(md5(rand()), 0, 7));
            $t_time = time();
            $new_key = md5(uniqid($t_time,true));
            $token .= $new_key;
            $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
            $this->db->trans_start();
            $this->db->query('CALL `RootTokenGeneration`("' . $rootID . '","' . $token . '","' . $expired_at . '")');
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('status' => '500', 'message' => 'Internal server error.');
            } else {
                $this->db->trans_commit();
                return array('status' => '200', 'message' => 'Successfully login.', 'rootID' => $rootID, 'rootFirstName'=>$rootFirstName,'rootLastName'=>$rootLastName,'rootUserName'=> $rootUserName,'token' => $token,'rootLastLogin' => $rootLastLogin);
            }
        } else {
            return array('status' => '401', 'message' => 'Incorrect username or password.');
        }


    }

    

    // ADD USER TOKEN
    public function addUserToken($rootID, $token, $expiredAt)
    {
        $result  = $this->db->query('CALL `RootTokenGeneration`("' . $rootID . '","' . $token . '", "' . $expiredAt . '" )');

        return $result;
    }
}
