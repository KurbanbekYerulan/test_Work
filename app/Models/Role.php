<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ROLE_ADMIN_ID = 1;
    public const ROLE_USER_ID = 2;
    public const ROLE_MANAGER_ID = 3;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
