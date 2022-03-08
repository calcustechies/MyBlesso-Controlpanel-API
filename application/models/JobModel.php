<?php
defined('BASEPATH') or exit('No direct script access allowed');


class JobModel extends CI_Model{



//Display Posted Jobs With Filter

    public function postedJobs($JobCat,$JobType,$JobPostDistrictID,$JobPostStateID,$JobPostedBY,$JobPostID, $page_no, $page_limit)
    {
        $result = $this->db->query('CALL `DisplayPostedJobs`("' . $JobCat . '","' . $JobType . '","' . $JobPostDistrictID . '","' . $JobPostStateID . '","' . $JobPostedBY . '","' . $JobPostID . '","' . $page_no . '","' . $page_limit . '")');
        return $result;
    }

//Post and Manage Jobs

    public function manageJobs($JobPostID,$JobPostTitle,$JobPostType,$JobPostCat,$JobPostMinSalary,$JobPostMaxSalary,$JobPostMinExp,$JobPostMaxExp,$JobPostDistrictID,$JobPostLocality,$JobPostStateID,$JobPostCountryID,$JobPostDescription,$JobPostHiringFor,$JobPostContactEmail,$JobPostContactPhone,$JobPostContactAddress,$JobPostedBY,$jobIMG)
    {
        $result = $this->db->query('CALL `manageJobs`("' . $JobPostID . '","' . $JobPostTitle . '","' . $JobPostType . '","' . $JobPostCat . '","' . $JobPostMinSalary . '","' . $JobPostMaxSalary . '","' . $JobPostMinExp . '","' . $JobPostMaxExp . '","' . $JobPostDistrictID . '","' . $JobPostLocality . '","' . $JobPostStateID . '","' . $JobPostCountryID . '","' . $JobPostDescription . '","' . $JobPostHiringFor . '","' . $JobPostContactEmail . '","' . $JobPostContactPhone . '","' . $JobPostContactAddress . '","' . $JobPostedBY . '","' . $jobIMG . '")');
        return $result;
    }
 


//Display Job Categories 

public function jobcategories($jobCategoryID)
{
    $result = $this->db->query('CALL `DisplayJobCategory`("'.$jobCategoryID.'")');
    return $result;
}


//Search Jobs


public function jobSearch($SearchText,$JobPostCat,$JobPostType,$JobPostMinSalary,$JobPostMaxSalary,$JobPostStateID,$JobPostDistrictID,$page_no,$page_limit,$userpin)
{
    $mul = $page_no*10;
    $val = $mul-10;
    $result = $this->db->query('CALL `SearchJobs`("'.$SearchText.'","'.$JobPostCat.'","'.$JobPostType.'","'.$JobPostMinSalary.'","'.$JobPostMaxSalary.'","'.$JobPostStateID.'","'.$JobPostDistrictID.'","'.$val.'","'.$page_limit.'","'.$userpin.'")');
    return $result;
}

//Job Count
public function jobcount($SearchText,$JobPostCat,$JobPostType,$JobPostMinSalary,$JobPostMaxSalary,$JobPostStateID,$JobPostDistrictID,$userpin)
{

    $result = $this->db->query('CALL `DisplayPostedJobsTotalCount`("'.$SearchText.'","'.$JobPostCat.'","'.$JobPostType.'","'.$JobPostMinSalary.'","'.$JobPostMaxSalary.'","'.$JobPostStateID.'","'.$JobPostDistrictID.'","'.$userpin.'")');
    return $result;
}



    //DealWithAJobReply

    public function dealReply($replyID)
    {
        $result = $this->db->query('CALL `DealWithAJobReply`("'.$replyID.'")');
        return $result;
    }
    

    //Pay For A Job

    public function payJob($PayedAmount,$replyID)
    {
        $result = $this->db->query('CALL `PayForAJob`("'.$PayedAmount.'","'.$replyID.'")');
        return $result;
    }

// Complete a deal

    public function dealComplete($replyID)
    {
        $result = $this->db->query('CALL `CompleteDeal`("'.$replyID.'")');
        return $result;
    }
    
//Manage Job Rating

public function manageJobRate($jobID,$userID,$Rating,$RatingID)
{
    $result = $this->db->query('CALL `manageJobRating`("'.$jobID.'","'.$userID.'","'.$Rating.'","'.$RatingID.'")');
    return $result;
}
//Manage Job Comment
public function manageJobComments($commentID,$jobID,$repliedBY,$comment,$commentedForCommentID)
{
    $result = $this->db->query('CALL `manageJobComments`("'.$commentID.'","'.$jobID.'","'.$repliedBY.'","'.$comment.'","'.$commentedForCommentID.'")');
    return $result;
}

// Display job comment

public function displayJobComments($commentID,$commentedForCommentID,$jobID,$repliedBY)
{
    $result = $this->db->query('CALL `DisplayJobComments`("'.$commentID.'","'.$commentedForCommentID.'","'.$jobID.'","'.$repliedBY.'")');
    return $result;
}



public function catUpsert($jobCategoryName,$jobCategoryAddedBY,$jobCatImg,$jobCategoryID)
{
    $result = $this->db->query('CALL `manageJobCat`("' . $jobCategoryName . '","' . $jobCategoryAddedBY . '","' . $jobCatImg . '","' . $jobCategoryID . '")');
    return $result;
}




 //Freeze Or Unfreeze Job Cat 
 public function freezeOrUnfreeze($jobCategoryID, $fz)
 {
     $result = $this->db->query('CALL `FreezeOrUnfreezeJobCat`("' . $jobCategoryID . '","' . $fz . '")');
    // return $result;
 }













}
?>