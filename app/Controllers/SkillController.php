<?php

namespace App\Controllers;

use App\Helpers\Helper;
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

        return View::render('skills/index.view', [
            
            'skills' => $skill->getUserSkills($id),
            'user' => $id,
           
        ]);
    }

    //show one skill record
    public function show()
    {
        $skillId = Helper::getIdFromUrl('skill');
        
        $skill = SkillModel::load()->get($skillId);

        return View::render('skills/show.view', [
            'skill' => $skill, 
        ]);
    }


    //form for editing one skill record
    public function edit()
    {
        $skill = new SkillModel;
        $skill->id = Helper::getIdFromUrl('skill'); 
        
        $skill = SkillModel::load()->get($skill->id); 

        return View::render('skills/edit.view', [
            'method'    => 'POST',  
            'action'    => '/skill/' . $skill->id . '/update', 
            'skill' => $skill, 
        ]);
    }

    //update skill record with data from edit()
    public function update()
    {
        $skill = $_POST; 
        $skill['updated_by'] = Helper::getUserIdFromSession(); 
       
        SkillModel::load()->update($skill, $skill['id']);

        return View::redirect('skill');
    }

    //form to create new skill record
    public function create()
    {
        return View::render('skills/create.view', [
            'method'    => 'POST',
            'action' => '/skill/store', 
            
        ]);
    }

    //store new skill from create()
    public function store()
    {

        $skill = $_POST;  
        $skill['user_id'] = Helper::getUserIdFromSession(); 
        $skill['created_by'] = Helper::getUserIdFromSession(); 
        $skill['created'] = date('Y-m-d'); 

        SkillModel::load()->store($skill);  

        return View::redirect("skill"); 

    }

    //destroy one skill record 
    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('skill'); 
        
        SkillModel::load()->destroy($id);
        
        return View::redirect("skill");
    }
}