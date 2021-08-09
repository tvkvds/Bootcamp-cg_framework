<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\SkillModel;
use App\Libraries\View;
use App\Models\RoleModel;

class SkillController extends Controller
{
    //list of all skills from one user
    public function index()
    {
        
        $skill = new SkillModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        View::render('skills/index.view', [
            
            'skills' => $skill->getUserSkills($id),
            'user' => $id,
           
        ]);
    }

    //show one skill record
    public function show()
    {
        $skillId = Helper::getIdFromUrl('skill');
        
        $skill = SkillModel::load()->get($skillId);

        View::render('skills/show.view', [
            'skill' => $skill, 
        ]);
    }


    //form for editing one skill record
    public function edit()
    {
        $skill = new SkillModel;

        $skill->id = Helper::getIdFromUrl('skill'); //gets id of requested education
        
        $skill = SkillModel::load()->get($skill->id); //gets one education record

        return View::render('skills/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/skill/' . $skill->id . '/update', //set where the form must be submitted to
            'skill' => $skill, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
            ''
        ]);
    }

    //update skill record with data from edit()
    public function update()
    {
        $skill = $_POST; //get data from req
        $skill['updated_by'] = Helper::getUserIdFromSession(); //add id of updater
       
        SkillModel::load()->update($skill, $skill['id']);

        View::redirect('skill');
    }

    //form to create new skill record
    public function create()
    {
        return View::render('skills/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/skill/store', //set destination for form
            'roles'     => RoleModel::load()->all(), //get roles for permission middleware
        ]);
    }

    //store new skill from create()
    public function store()
    {

        $skill = $_POST;  //set vars from user
        $skill['user_id'] = Helper::getUserIdFromSession(); //set id of user
        $skill['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $skill['created'] = date('Y-m-d'); // add timestamp

        SkillModel::load()->store($skill);  //send to database

        View::redirect("skill"); //redirect to index page educations

    }

    //destroy one skill record 
    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('skill'); 
        
        SkillModel::load()->destroy($id);
        
        View::redirect("skill",[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }
}