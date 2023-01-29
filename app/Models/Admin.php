<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;   

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ["nama", "email", "telepon", "password"];
    protected $table = "admin";
}
