<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\JobModel;
use App\Libraries\View;
use App\Models\RoleModel;

class JobController extends Controller
{
    
    /**
     * Show's a list of educations
     */
    public function index()
    {
        
        $job = new JobModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        View::render('jobs/index.view', [
            
            'jobs' => $job->getUserJobs($id),
            'user' => $id,
           
        ]);
    }

    /**
     * Show education record
     */
    public function show()
    {
        $jobId = Helper::getIdFromUrl('job');
        
        $job = JobModel::load()->get($jobId);

        View::render('jobs/show.view', [
            'job' => $job, 
        ]);
    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $job = new JobModel;

        $job->id = Helper::getIdFromUrl('job'); //gets id of requested education
        
        $job = JobModel::load()->get($job->id); //gets one education record

        return View::render('jobs/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/job/' . $job->id . '/update', //set where the form must be submitted to
            'job' => $job, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
            ''
        ]);
    }

}