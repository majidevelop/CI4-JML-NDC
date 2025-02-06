<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Name of the database table
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = ['username', 'password']; // Fields that can be inserted/updated
}