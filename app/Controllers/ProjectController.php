<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\ProjectModel;
use App\Libraries\View;
use App\Models\RoleModel;

class ProjectController extends Controller
{
    //list of all projects from one user
    public function index()
    {
        
        $project = new ProjectModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        View::render('projects/index.view', [
            
            'projects' => $project->getUserProjects($id),
            'user' => $id,
           
        ]);
    }

    //show one project record
    public function show()
    {
        $projectId = Helper::getIdFromUrl('project');
        
        $project = ProjectModel::load()->get($projectId);

        View::render('projects/show.view', [
            'project' => $project, 
        ]);
    }


    //form for editing one project record
    public function edit()
    {
        $project = new ProjectModel;

        $project->id = Helper::getIdFromUrl('project'); //gets id of requested education
        
        $project = ProjectModel::load()->get($project->id); //gets one education record

        return View::render('projects/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/project/' . $project->id . '/update', //set where the form must be submitted to
            'project' => $project, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
            ''
        ]);
    }

    //update project record with data from edit()
    public function update()
    {
        $project = $_POST; //get data from req
        
        $project['updated_by'] = Helper::getUserIdFromSession();
       
        ProjectModel::load()->update($project, $project['id']);

        View::redirect('project');
    }

    //form to create new project record
    public function create()
    {
        return View::render('projects/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/project/store', //set destination for form
            'roles'     => RoleModel::load()->all(), //get roles for permission middleware
        ]);
    }

    //store new project from create()
    public function store()
    {

        $project = $_POST;  //set vars from user
        $project['user_id'] = Helper::getUserIdFromSession(); //set id of user
        $project['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $project['created'] = date('Y-m-d'); // add timestamp

        ProjectModel::load()->store($project);  //send to database

        View::redirect("project"); //redirect to index page educations

    }

    //destroy one project record 
    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('project'); 
        
        ProjectModel::load()->destroy($id);
        
        View::redirect("project",[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }
}