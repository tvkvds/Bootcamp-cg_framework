<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\MySql;
use App\Models\UserModel;
use App\Libraries\View;
use App\Models\RoleModel;

class UserController extends Controller
{

    /**
     * Show's a list of users
     */
    public function index()
    {
        
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

        // Remmove the form token
        unset($user['f_token']);

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


    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        
    }

    /**
     * Show user record
     */
    public function show()
    {
        $userId = Helper::getIdFromUrl('user');
        
        $user = UserModel::load()->get($userId);
    }

    /**
     * Archive a user record into the database (soft delete)
     */
    public function destroy()
    {

    }

}

