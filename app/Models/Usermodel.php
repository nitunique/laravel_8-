<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'address','role_id'
    ];

    protected $appends = ['role'];

    public function roles()
    {
        return $this->hasone('App\Rolemodel','id','role_id');
    }
}
