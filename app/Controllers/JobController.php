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

    public function update()
    {
        $job = $_POST; //get data from req
        $job['updated_by'] = Helper::getUserIdFromSession();
       
        JobModel::load()->update($job, $job['id']);

        View::redirect('job');
    }

    /**
     * Show a form to create a new education
     */
    public function create()
    {
        return View::render('jobs/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/job/store', //set destination for form
            'roles'     => RoleModel::load()->all(), //get roles for permission middleware
        ]);
    }

    //store new job from create()
    public function store()
    {

        $job = $_POST;  //set vars from user
        $job['user_id'] = Helper::getUserIdFromSession(); //set id of user
        $job['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $job['created'] = date('Y-m-d'); // add timestamp

        JobModel::load()->store($job);  //send to database

        View::redirect("job"); //redirect to index page educations

    }

    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('job'); 
        
        JobModel::load()->destroy($id);
        
        View::redirect("job",[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }

}