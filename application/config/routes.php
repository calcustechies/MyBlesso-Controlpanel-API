<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//user login 
$route['userLogin'] = 'Auth/login';




//Advertisement
//Manage Advertisement
$route['postManageAdvt'] = 'Advt/manage';
//View Advertisement
$route['DisplayAdvertisement/(.+)/(.+)/(.+)'] = 'Advt/viewAdvertisement/$1/$2/$3';
//Freeze Advertisement
$route['Freeze/(.+)/(.+)'] = 'Advt/freezeAdvertisement/$1/$2';
// Delete  Advertisement
$route['Delete/(.+)'] = 'Advt/deleteAdvertisement/$1';


//User 
//Display User Details
$route['displayUserDetails/(.+)/(.+)'] = 'Users/displayUserDetails/$1/$2';
//Display Root Profile
$route['displayRootProfile/(.+)'] = 'Users/displayRootProfile/$1';
//Display User Details Filter
$route['displayUserDetailsFilter/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)'] = 'Users/userDetailsFilter/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
//Display User Details Filter Count
$route['displayUserDetailsFilterCount/(.+)'] = 'Users/userDetailsFilterCount/$1';




//Jobs
//Display Posted Jobs With Filter
$route['DisplayPostedJobsWithFilter/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)'] = 'Jobs/displayJobs/$1/$2/$3/$4/$5/$6/$7/$8';
//Post and Manage Jobs
$route['postManageJobs'] = 'Jobs/manageJobs';
//Display Job Categories 
$route['DisplayjobCategories/(.+)'] = 'Jobs/jobCategory/$1';
//Search Jobs
$route['JobSearch'] = 'Jobs/searchJobs';
//Deal With A JobReply
$route['dealJobReplys/(.+)'] = 'Jobs/dealJobReply/$1';
//Pay For A Job
$route['payForAJob'] = 'Jobs/payment';
// Complete a deal
$route['completeDeals/(.+)'] = 'Jobs/completeaDeal/$1';

//Manage Job Comment
$route['manageJobrating'] = 'Jobs/manageJobRating';
//Manage Job Comment
$route['manageJobComments'] = 'Jobs/manageJobComment';
//Display Job Comment
$route['displayJobComments'] = 'Jobs/displayJobComment';
//Job Cat Upsert
$route['jobCatUpsert'] = 'Jobs/jobCatUpsert';
//Freeze Or Unfreeze Job Cat 
$route['freezeOrUnfreeze/(.+)/(.+)'] = 'Jobs/freezeOrUnfreezeJobCat/$1/$2';





//Cash flow
//Display System Cash Flow (e-wallet 'client')
$route['cashFlowEwallet/(.+)/(.+)/(.+)'] = 'CashFlow/eWallet/$1/$2/$3';
//Display System Cash Flow Admin
$route['AdminCashFlow/(.+)/(.+)/(.+)/(.+)'] = 'CashFlow/adminCashFlow/$1/$2/$3/$4';


//Job Reply
//Apply For Posted Job
$route['applyPostedJobs'] = 'ApplyJobs/applyPostedJobs';
//Display Job Post Reply
$route['viewJobPostReply/(.+)/(.+)/(.+)'] = 'ApplyJobs/displayJobPostReply/$1/$2/$3';
//Display Job Post Reply Filter
$route['viewJobPostReplyFilter/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)/(.+)'] = 'ApplyJobs/displayJobPostReply/$1/$2/$3/$4/$5/$6/$7';
//Display Posted Jobs Total Count ( for pagination)
$route['Pagination'] = 'ApplyJobs/displayPostedJobsTotalCount';


