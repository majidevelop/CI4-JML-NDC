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

    public function members(){
        $memberController = new MemberController();
        $members = $memberController->get_members();
        return view('member/list_members', ['members' => $members]);
    }
    public function viewMember($id){
        $memberController = new MemberController();

        $members = $memberController->getMemberById($id);
        return view('member/view_member', ['member' => $members]);
    }
}