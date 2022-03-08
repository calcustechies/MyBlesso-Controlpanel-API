
<?php
defined('BASEPATH') or exit('No direct script access allowed');


class CashFlowModel extends CI_Model
{



//Display System Cash Flow (e-wallet 'client')    

public function displayEWallet($ID, $userID, $methods)
{
    $result = $this->db->query('CALL `DisplaySystemCashFlow`("'.$ID.'","'.$userID.'","'.$methods.'")');
    return $result;
}


public function displaySystemCashFlowAdmin($walletID, $fromUserID, $toUserID, $meathod)
{
    $result = $this->db->query('CALL `DisplaySystemCashFlowAdmin`("'.$walletID.'","'.$fromUserID.'","'.$toUserID.'","'.$meathod.'")');
    return $result;
}


}
?>