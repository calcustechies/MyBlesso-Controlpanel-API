<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ApplyJobsModel extends CI_Model{


// Apply For Posted Jobs

public function applyPostedJobs($jobPostID,$repliedBY,$CustomMessage)
{
    $result = $this->db->query('CALL `ApplyForJob`("' . $jobPostID . '","' . $repliedBY . '","' . $CustomMessage . '")');
    return $result;
}


//Display Job Post Reply

public function viewJobPostReply($jobPostID,$replyID,$repliedBY)
{
    $result = $this->db->query('CALL `DisplayJobPostReply`("'.$jobPostID.'","'.$replyID.'","'.$repliedBY.'")');
    return $result;
}


//Display Job Post Reply Filter

public function viewJobPostReplyFilter($jobPostID,$replyID,$repliedBY,$JobPostedBY,$DealIT,$Payed,$DealCompleted)
{
    $result = $this->db->query('CALL `DisplayJobPostReplyFilter`("'.$jobPostID.'","'.$replyID.'","'.$repliedBY.'","'.$JobPostedBY.'","'.$DealIT.'","'.$Payed.'","'.$DealCompleted.'")');
    return $result;
}

//Display Posted Jobs Total Count ( for pagination)

public function forPagination()
{
    $result = $this->db->query('CALL `DisplayPostedJobsTotalCount`()');
    return $result;
}



}
