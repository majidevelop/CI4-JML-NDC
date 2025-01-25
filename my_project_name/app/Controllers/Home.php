<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function memberRegistration(){
        $db = \Config\Database::connect();
        $builder = $db->table('locations');
        $taluks = $builder->get()->getResultArray();

        return view('member/registration', ['taluks'=> $taluks]);
    }
}
