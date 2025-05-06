<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home_page');
    }
    public function memberRegistration(){
        $db = \Config\Database::connect();
        $builder = $db->table('locations');
        $taluks = $builder->get()->getResultArray();
        
        $builder = $db->table('districts');
        $districts = $builder->get()->getResultArray();

        return view('member/registration', ['taluks'=> $taluks, 'districts' => $districts]);
    }
}
