<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Models\UserModel;

class HomeController {

    public function index()
    {
        $userModel = new UserModel();
       

        View::render('site/home.view', [
            'users' => $userModel->all(['first_name', 'last_name', 'id']),
            
        ]);
    }

}