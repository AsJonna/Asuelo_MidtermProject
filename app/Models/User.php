<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbluser';

    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'gender'
    ];
}