<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function employee_contacts()
    {
        return $this->hasMany('App\Models\EmployeeContact');
    }

    public function employee_addresses()
    {
        return $this->hasMany('App\Models\EmployeeAddress');
    }
}
