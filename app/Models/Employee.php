<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'address'
    ];

    // ✳ One employee has One department
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    // ✳ One employee has one or more contact numbers
    public function employee_contacts()
    {
        return $this->hasMany('App\Models\EmployeeContact');
    }

    // ✳ One employee has one or more addresses
    public function employee_addresses()
    {
        return $this->hasMany('App\Models\EmployeeAddress');
    }
}
