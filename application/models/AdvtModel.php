<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AdvtModel extends CI_Model
{

    //Manage Advertisement
    public function manage($advtId, $userId, $advtImage, $advtTitle, $advtTitleDescription, $advtLink)
    {
        $result = $this->db->query('CALL `manageadvertisement`("' . $advtId . '","' . $userId . '","' . $advtImage . '","' . $advtTitle . '","' . $advtTitleDescription . '","' . $advtLink . '")');
        return $result;
    }



    //View Advertisement
    public function viewAdvertis($userId, $advtId, $clientView)
    {
        $result = $this->db->query('CALL `Viewadvertisement`("' . $userId . '","' . $advtId . '","' . $clientView . '")');
        return $result;
    }


    // Freeze Advertisement
    public function freezeAdvertis($advertisementId, $fzValue)
    {
        $result = $this->db->query('CALL `freezeadvertisement`("' . $advertisementId . '","' . $fzValue . '")');
       // return $result;
    }

    //Delete Advertisement

    public function deleteAdvertis($advertisementId)
    {
        $result = $this->db->query('CALL `Deleteadvertisement`("'. $advertisementId .'")');
       // return $result;
    }
}
