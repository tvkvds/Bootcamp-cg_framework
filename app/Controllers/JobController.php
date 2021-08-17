<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\JobModel;
use App\Libraries\View;
use App\Models\RoleModel;
use FFI\Exception;

class JobController extends Controller
{
    
    /**
     * Show's a list of educations
     */
    public function index()
    {
        
        $job = new JobModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        return View::render('jobs/index.view', [
            
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

        return View::render('jobs/show.view', [
            'job' => $job, 
        ]);
    }

    /**
     * Show a form to edit a job record
     */
    public function edit()
    {
        $job = new JobModel;
        $job->id = Helper::getIdFromUrl('job'); 
        
        $job = JobModel::load()->get($job->id); 

        return View::render('jobs/edit.view', [
            'method'    => 'POST', 
            'action'    => '/job/' . $job->id . '/update', 
            'job' => $job, 
            
        ]);
    }

    public function update()
    {
            
            $job = $_POST; //get data from req
            $job['updated_by'] = Helper::getUserIdFromSession();
            if ($job['responsibilities'] === ''){
                $job['responsibilities'] = NULL;
            }
            if ($job['end_year'] === ''){
                $job['end_year'] = NULL;
            }
           
            JobModel::load()->update($job, $job['id']);
            
            return View::redirect('job');
           
    }

    /**
     * Show a form to create a new education
     */
    public function create()
    {
        return View::render('jobs/create.view', [
            'method'    => 'POST', 
            'action' => '/job/store', 
            
        ]);
    }

    //store new job from create()
    public function store()
    {   
        
        $job = $_POST;  //set vars from user
        if ($job['end_year'] == "") {$job['end_year'] = NULL;}
        $job['user_id'] = Helper::getUserIdFromSession(); //set id of user
        $job['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $job['created'] = date('Y-m-d'); // add timestamp
        if ($job['responsibilities'] === ''){
            $job['responsibilities'] = NULL;
        }
        if ($job['end_year'] === ''){
            $job['end_year'] = NULL;
        }

        JobModel::load()->store($job);  //send to database

        return View::redirect("job"); //redirect to index page educations

    }

    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('job'); 
        
        JobModel::load()->destroy($id);
        
        return View::redirect("job",[
           
        ]);
    }

}