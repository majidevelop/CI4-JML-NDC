<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MemberModel;
class LocationController extends Controller
{
    public function listLocations(){
        $db = \Config\Database::connect();
        $builder = $db->table('locations');
        $builder->select('locations.*');
        $locations = $builder->get()->getResultArray();
        return view('member/list_locations', ['locations' => $locations]);
    }
}