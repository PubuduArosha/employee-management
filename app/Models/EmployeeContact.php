<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'contact_number'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
