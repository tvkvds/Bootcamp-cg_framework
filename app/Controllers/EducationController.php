<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\EducationModel;
use App\Libraries\View;

class EducationController extends Controller
{
    
    /**
     * Show's a list of educations
     */
    public function index()
    {
        
        $education = new EducationModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        return View::render('educations/index.view', [
            
            'educations' => $education->getUserEducations($id),
            'user' => $id,
           
        ]);
    }

    /**
     * Show education record
     */
    public function show()
    {
        $id = Helper::getIdFromUrl('education');
        
        $education = EducationModel::load()->get($id);

        return View::render('educations/show.view', [
            'education' => $education, 
            
        ]);
    }


    /**
     * Show a form to create a new education
     */
    public function create()
    {

        return View::render('educations/create.view', [
            'method'    => 'POST', 
            'action' => '/education/store', 
            
        ]);
    }

    //store new education from create()
    public function store()
    {

        //set up data
        $education = $_POST;  
        $education['user_id'] = Helper::getUserIdFromSession(); 
        $education['created_by'] = Helper::getUserIdFromSession(); 
        $education['created'] = date('Y-m-d'); 

        //store to database
        EducationModel::load()->store($education);  

        //add flash message
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->info('New education succesfully created!');

        return View::redirect('education',[
            
        ]);

    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $education = new EducationModel;
        $education->id = Helper::getIdFromUrl('education'); 
        $education = EducationModel::load()->get($education->id); 

        return View::render('educations/edit.view', [
            'method'    => 'POST',  
            'action'    => '/education/' . $education->id . '/update', 
            'education' => $education, 
            
        ]);
    }

    //save an edited form to database
    public function update()
    {
        $education = $_POST; 
        $education['updated_by'] = Helper::getUserIdFromSession();
        EducationModel::load()->update($education, $education['id']); 

        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->info('Your education has been edited!');

        return View::redirect('education',[
            
        ]);
    }

    /**
     * Archive a user record into the database (soft delete)
     */
    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('education'); 
        
        EducationModel::load()->destroy($id);
        
        return View::redirect("education",[
            
        ]);
    }


}
