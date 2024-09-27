<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'status_id'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_role');
    }

    public function employeeRoles()
    {
        return $this->hasMany(EmployeeRole::class);
    }
}

