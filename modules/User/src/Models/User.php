<?php

namespace Modules\User\src\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'email',
        'group_id',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
