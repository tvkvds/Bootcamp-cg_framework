<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\HobbyModel;
use App\Libraries\View;

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
        $hobby->id = Helper::getIdFromUrl('hobby'); 
        
        $hobby = HobbyModel::load()->get($hobby->id); 

        return View::render('hobbies/edit.view', [
            'method'    => 'POST',  
            'action'    => '/hobby/' . $hobby->id . '/update', 
            'hobby' => $hobby, 
        ]);
    }

    //update hobby record with date from edit()
    public function update()
    {
        $hobby = $_POST; //get data from req
        $hobby['updated_by'] = Helper::getUserIdFromSession();
       
        HobbyModel::load()->update($hobby, $hobby['id']);

        return View::redirect('hobby');
    }

    //show form to create new hobby
    public function create()
    {
        return View::render('hobbies/create.view', [
            'method'    => 'POST', 
            'action' => '/hobby/store', 
            
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

        return View::redirect("hobby"); //redirect to index page 

    }

    public function destroy()
    {
        
        $id = Helper::getIdFromUrl('hobby'); 
        
        HobbyModel::load()->destroy($id);
        
        return View::redirect("hobby");
    }

}