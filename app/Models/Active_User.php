<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active_User extends Model
{
    use HasFactory;
    protected $table = "active_users";
    public $timestamps = false;
}