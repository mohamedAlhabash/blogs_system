<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mindscms\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use HasFactory;
    protected $guarded = [];
}
