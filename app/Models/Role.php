<?php

namespace App\Models;

use App\Traits\DateTimeMutator;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    public $guard_name = 'web';



}
