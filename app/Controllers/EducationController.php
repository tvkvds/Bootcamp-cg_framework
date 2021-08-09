<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\EducationModel;
use App\Libraries\View;
use App\Models\RoleModel;

class EducationController extends Controller
{
    
    /**
     * Show's a list of educations
     */
    public function index()
    {
        
        $education = new EducationModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        View::render('educations/index.view', [
            
            'educations' => $education->getUserEducations($id),
            'user' => $id,
            'roles' => RoleModel::load()->all(), 
           
        ]);
    }

    /**
     * Show education record
     */
    public function show()
    {
        $id = Helper::getIdFromUrl('education');
        
        $education = EducationModel::load()->get($id);

        View::render('educations/show.view', [
            'education' => $education, 
            'roles'     => RoleModel::load()->all(), 
        ]);
    }


    /**
     * Show a form to create a new education
     */
    public function create()
    {
        return View::render('educations/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/education/store', //set destination for form
            'roles'     => RoleModel::load()->all(), //get roles for permission middleware
        ]);
    }

    //store new education from create()
    public function store()
    {

        $education = $_POST;  //set vars from user

        $education['user_id'] = Helper::getUserIdFromSession(); //set id of user

        $education['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $education['created'] = date('Y-m-d'); // add timestamp

        EducationModel::load()->store($education);  //send to database

        View::redirect('education',[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware]); //to a page where update is visible
        ]);

    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $education = new EducationModel;
        

        $education->id = Helper::getIdFromUrl('education'); //gets id of requested education
        
        $education = EducationModel::load()->get($education->id); //gets one education record

        return View::render('educations/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/education/' . $education->id . '/update', //set where the form must be submitted to
            'education' => $education, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
            ''
        ]);
    }

    //save an edited form to database
    public function update()
    {
        $education = $_POST; //get data from req
        $education['updated_by'] = Helper::getUserIdFromSession();
       
        EducationModel::load()->update($education, $education['id']); //mysql post to database

        View::redirect('education',[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware]); //to a page where update is visible
        ]);
    }

    /**
     * Archive a user record into the database (soft delete)
     */
    public function destroy()
    {
        //id = get education id from url - helper-getidfromurl
        $id = Helper::getIdFromUrl('education'); //gets id of requested education
        //userid->destroy - educationmodel-load-delete/destroy insert id
        EducationModel::load()->destroy($id);
        //direct to page - view redirect to relevant page
        View::redirect("education",[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }


}
