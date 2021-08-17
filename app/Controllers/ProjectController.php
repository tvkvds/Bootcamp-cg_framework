<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\ProjectModel;
use App\Libraries\View;


class ProjectController extends Controller
{
    //list of all projects from one user
    public function index()
    {
        
        $project = new ProjectModel();
        $id = Helper::getUserIdFromSession();

        return View::render('projects/index.view', [
            
            'projects' => $project->getUserProjects($id),
            'user' => $id,
           
        ]);
    }

    //show one project record
    public function show()
    {
        $projectId = Helper::getIdFromUrl('project');
        
        $project = ProjectModel::load()->get($projectId);

        return View::render('projects/show.view', [
            'project' => $project, 
        ]);
    }


    //form for editing one project record
    public function edit()
    {
        //set up data
        $project = new ProjectModel;
        $project->id = Helper::getIdFromUrl('project'); 
        
        //interact with database
        $project = ProjectModel::load()->get($project->id); 

        return View::render('projects/edit.view', [
            'method'    => 'POST',  
            'action'    => '/project/' . $project->id . '/update', 
            'project' => $project, 
            
        ]);
    }

    //update project record with data from edit()
    public function update()
    {
        $project = $_POST; 
        $project['updated_by'] = Helper::getUserIdFromSession();
        if ($project['role'] === ''){
            $project['role'] = NULL;
        }
       
        ProjectModel::load()->update($project, $project['id']);

        return View::redirect('project');
    }

    //form to create new project record
    public function create()
    {
        return View::render('projects/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/project/store', //set destination for form
        ]);
    }

    //store new project from create()
    public function store()
    {

        $project = $_POST;  
        $project['user_id'] = Helper::getUserIdFromSession(); 
        $project['created_by'] = Helper::getUserIdFromSession(); 
        $project['created'] = date('Y-m-d'); 
        if ($project['role'] === ''){
            $project['role'] = NULL;
        }

        ProjectModel::load()->store($project);  

        return View::redirect("project"); 

    }

    //destroy one project record 
    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('project'); 
        
        ProjectModel::load()->destroy($id);
        
        return View::redirect("project");
    }
}