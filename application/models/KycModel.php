<?php
defined('BASEPATH') or exit('No direct script access allowed');


class KycModel extends CI_Model
{




  //Display Kyc Details 
public function viewkycDetails($CusID)
{
    $result = $this->db->query('CALL `DisplayKYC`("' . $CusID . '")');
    return $result;
}
  
  
  
  
  
  
  
  
 
 




















}