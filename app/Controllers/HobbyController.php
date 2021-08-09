<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\HobbyModel;
use App\Libraries\View;
use App\Models\RoleModel;

class HobbyController extends Controller
{
    
    //show all hobby records for one user
    public function index()
    {
        
        $hobby = new HobbyModel();
        $id = Helper::getUserIdFromSession(); //set user id 

        View::render('hobbies/index.view', [
            
            'hobbies' => $hobby->getUserHobbies($id),
            'user' => $id,
           
        ]);
    }

    //show hobby record
    public function show()
    {
        $hobbyId = Helper::getIdFromUrl('hobby');
        
        $hobby = HobbyModel::load()->get($hobbyId);

        View::render('hobbies/show.view', [
            'hobby' => $hobby, 
        ]);
    }

    //edit a hobby record
    public function edit()
    {
        $hobby = new HobbyModel;

        $hobby->id = Helper::getIdFromUrl('hobby'); //gets id of requested education
        
        $hobby = HobbyModel::load()->get($hobby->id); //gets one education record

        return View::render('hobbies/edit.view', [
            'method'    => 'POST',  //set method for the form
            'action'    => '/hobby/' . $hobby->id . '/update', //set where the form must be submitted to
            'hobby' => $hobby, //set data being passed to page
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
            ''
        ]);
    }

    //update hobby record with date from edit()
    public function update()
    {
        $hobby = $_POST; //get data from req
        $hobby['updated_by'] = Helper::getUserIdFromSession();
       
        HobbyModel::load()->update($hobby, $hobby['id']);

        View::redirect('hobby');
    }

    //show form to create new hobby
    public function create()
    {
        return View::render('hobbies/create.view', [
            'method'    => 'POST', // set method for form
            'action' => '/hobby/store', //set destination for form
            'roles'     => RoleModel::load()->all(), //get roles for permission middleware
        ]);
    }

    //store new hobby from create()
    public function store()
    {

        $hobby = $_POST;  //set vars from user
        $hobby['user_id'] = Helper::getUserIdFromSession(); //set id of user
        $hobby['created_by'] = Helper::getUserIdFromSession(); //add id of creator
        $hobby['created'] = date('Y-m-d'); // add timestamp

        HobbyModel::load()->store($hobby);  //send to database

        View::redirect("hobby"); //redirect to index page educations

    }

    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('hobby'); 
        
        HobbyModel::load()->destroy($id);
        
        View::redirect("hobby",[
            'roles'     => RoleModel::load()->all(), //load roles for permission middleware
        ]);
    }

}