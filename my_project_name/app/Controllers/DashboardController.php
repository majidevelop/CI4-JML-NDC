<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Ensure only authenticated users can access this page
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Display the dashboard view
        return view('Admin/dashboard');
    }
}