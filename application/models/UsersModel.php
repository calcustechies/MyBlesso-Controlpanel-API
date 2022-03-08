<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UsersModel extends CI_Model{



//Display User Details


    public function viewUserDetails($userDetailsID,$userType)
    {
        $result = $this->db->query('CALL `DisplayUserDetails`("'.$userDetailsID.'","'.$userType.'")');
        return $result;
    }


    public function viewRootProfile($rootID)
    {
        $result = $this->db->query('CALL `DisplayRootProfile`("'.$rootID.'")');
        return $result;
    }


//Display User Details Filter

    public function userFiltered($userGender, $userDistrict, $userState, $userExp, $userRating, $userType, $userskill, $userCat, $page_no, $page_limit)
    {
        $result = $this->db->query('CALL `DisplayUserDetailsFilter`("' . $userGender . '","' . $userDistrict . '","' . $userState . '","' . $userExp . '","' . $userRating . '","' . $userType . '","' . $userskill . '","' . $userCat . '","' . $page_no . '","' . $page_limit . '")');
        return $result;
    }


//Display User Details Filter Count

public function userFilteredCount($userType)
{
    $result = $this->db->query('CALL `DisplayUserDetailsFilterCount`("' . $userType . '")');
    return $result;
}




}
?>