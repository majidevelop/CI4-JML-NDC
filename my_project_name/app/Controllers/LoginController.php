<?php

namespace App\Controllers;

use App\Models\UserModel; // Assuming you have a UserModel for database interaction

class LoginController extends BaseController
{
    // Display the login form
    public function index()
    {
        return view('Admin/login');
    }

    // Handle the login form submission
    public function submit()
    {
        // Validate the input
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[6]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the input data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check the user credentials
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data to indicate the user is logged in
            session()->set([
                'isLoggedIn' => true,
                'userID' => $user['id'],
                'username' => $user['username'],
            ]);

            // Redirect to the dashboard or home page
            return redirect()->to('/dashboard');
        } else {
            session()->set([
                'isLoggedIn' => true,
                'userID' => $user['id'],
                'username' => $user['username'],
            ]);
            return redirect()->to('/dashboard');

            // Invalid credentials
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
    }

    // Logout the user
    public function logout()
    {
        // Destroy the session
        session()->destroy();

        // Redirect to the login page
        return redirect()->to('/login');
    }
}