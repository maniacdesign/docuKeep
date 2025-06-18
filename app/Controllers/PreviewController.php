<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PreviewController extends BaseController
{
    public function lihat()
    {
        return view('preview/lihat');
    }
}
