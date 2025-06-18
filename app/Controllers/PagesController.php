<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PagesController extends BaseController
{
    public function index()
    {
        // Render the view for index0
        return view('home');
    
    }
    public function blank()
    {
        // Render the view for index0
        return view('pages/blank');
    }
    public function bootstrapAlert()
    {
        // Render the view for index0
        return view('pages/bootstrap-alert');
    }
    public function bootstrapBadge()
    {
        // Render the view for index0
        return view('pages/bootstrap-badge');
    }
    public function advancedForm()
    {
        // Render the view for index0
        return view('pages/forms-advanced-form');
    }
    public function editorForm()
    {
        // Render the view for index0
        return view('pages/forms-editor');
    }
    public function validationForm()
    {
        // Render the view for index0
        return view('pages/forms-validation');
    }
    public function multipleUpload()
    {
        // Render the view for index0
        return view('pages/components-multiple-upload');
    }
    public function bootstrapForm()
    {
        // Render the view for index0
        return view('pages/bootstrap-form');
    }
}
