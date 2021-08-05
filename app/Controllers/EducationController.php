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
     * Show user record
     */
    public function show()
    {
        $educationId = Helper::getIdFromUrl('education');
        
        $education = EducationModel::load()->get($educationId);

        View::render('educations/show.view', [
            'education' => $education, 
        ]);
    }


}
