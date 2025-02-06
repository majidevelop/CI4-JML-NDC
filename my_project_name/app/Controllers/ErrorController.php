<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorController extends BaseController
{
    public function index()
    {
        return view('errors/html/error_403'); // Load the error view
    }
}
