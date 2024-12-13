<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public static $createRules = [
        'company' => 'required|max:50',
        'address' => 'required|max:100',
        'city' => 'required|max:50',
        'province' => 'required|max:50'
    ];

    public static function listAll()
    {
        return Employer::get();
    }
}
