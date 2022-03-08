<?php
defined('BASEPATH') or exit('No direct script access allowed');


class BankModel extends CI_Model
{




  //Display Bank Details 
public function viewBankDetails($userid)
{
    $result = $this->db->query('CALL `DisplayBankDetails`("' . $userid . '")');
    return $result;
}
  
  
  
  
  
  
  
  
 
 




















}