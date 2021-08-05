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
        $educationModel = new EducationModel();

        View::render('educations/index.view', [
            'educations' => $educationModel->all(),
            
        ]);
    }

    /**
     * Show education record
     */
    public function show()
    {
        $educationId = Helper::getIdFromUrl('education');
        
        $education = EducationModel::load()->get($educationId);

        View::render('educations/show.view', [
            'education' => $education, 
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

        View::redirect("educations"); //redirect to index page educations

    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $educationId = Helper::getIdFromUrl('education'); //gets id of requested education
        
        $education = EducationModel::load()->get($educationId); //gets one education record

        return View::render('educations/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/education/' . $educationId . '/update', //set where the form must be submitted to
            'education'      => $education, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }

    public function update()
    {
        $education = $_POST;

        $education['user_id'] = Helper::getUserIdFromSession(); //set id of user
       

        EducationModel::load()->update($education, 1); //send to database

        dd($education);

        

    }


}
