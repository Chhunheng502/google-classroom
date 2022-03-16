<?php

namespace App\Models\Nulls;

use App\Models\User;

class NullAdmin extends User
{
    protected $attributes = [
        'name' => 'Admin Not Found',
        'email' => 'Email Not Found'
    ];
}
