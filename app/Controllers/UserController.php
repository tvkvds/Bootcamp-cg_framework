<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\UserModel;
use App\Libraries\View;
use App\Models\EducationModel;
use App\Models\RoleModel;

class UserController extends Controller
{

    /**
     * Show's a list of users
     */
    public function index()
    {
        $userModel = new UserModel();

        View::render('users/index.view', [
            'users' => $userModel->all(),
            
        ]);
    }

    /**
     * Show a form to create a new user
     */
    public function create()
    {
        return View::render('users/create.view', [
            'method'    => 'POST',
            'roles'     => RoleModel::load()->all(),
        ]);
    }

    /**
     * Store a user record into the database
     */
    public function store()
    {
        // Save post data in $user var
        $user = $_POST;

        // Create a password, set created_by ID and set the date of creation
        $user['password'] = password_hash('Gorilla1!', PASSWORD_DEFAULT);
        $user['created_by'] = Helper::getUserIdFromSession();
        $user['created'] = date('Y-m-d');

        // Save the record to the database
        UserModel::load()->store($user);
    }

    /**
     * Show a form to edit a user record
     */
    public function edit()
    {
        $userId = Helper::getIdFromUrl('user');
        
        $user = UserModel::load()->get($userId);

        return View::render('users/edit.view', [
            'method'    => 'POST',
            'action'    => '/user/' . $userId . '/update',
            'user'      => $user,
            'roles'     => RoleModel::load()->all(),
        ]);
    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        // Save post data in $user var
        $user = $_POST;

        // Create a password, set created_by ID and set the date of creation
        $user['password'] = password_hash('Gorilla1!', PASSWORD_DEFAULT);
        $user['created_by'] = Helper::getUserIdFromSession();
        $user['created'] = date('Y-m-d');

        // Save the record to the database
        UserModel::load()->update($user, Helper::getUserIdFromSession());
    }

    /**
     * Show user record
     */
    public function show()
    {
        $userId = Helper::getIdFromUrl('user');
        
        $user = UserModel::load()->get($userId);
        #$education = EducationModel::load()->getUserEducations($userId);

        View::render('users/show.view', [
            'user' => $user, 
            #'educations' => $education,
        ]);
    }

    /**
     * Archive a user record into the database (soft delete)
     */
    public function destroy()
    {

    }

}

