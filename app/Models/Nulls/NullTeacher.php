<?php

namespace App\Models\Nulls;

use App\Models\User;

class NullTeacher extends User
{
    protected $attributes = [
        'name' => 'No Teacher Found',
        'email' => 'No Email Found'
    ];
}
