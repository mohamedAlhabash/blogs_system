<?php

namespace App\Models;

use Mindscms\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;
use Mindscms\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends EntrustPermission
{
    use HasFactory;
    protected $guarded = [];
}
