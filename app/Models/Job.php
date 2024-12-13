<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public static $createRules = [
        'title' => 'required|max:100',
        'description' => 'required|max:1000',
        'start_date' => 'required|date',
        'pay' => 'required|decimal:0,2'
    ];

    public static function listAllByEmployerId($employerId)
    {
        return parent::where('employer_id', $employerId)->get();
    }
}
