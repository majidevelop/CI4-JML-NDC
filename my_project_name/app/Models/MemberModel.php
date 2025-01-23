<?php 
namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'email', 'mobile', 'address', 'state', 'district',
        'pin', 'taluk', 'panchayath', 'photo', 'aadhar'
    ];
}

?>