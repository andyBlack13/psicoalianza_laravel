<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'identification',
        'address',
        'phone',
        'city_id'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'employee_role');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function employeeRoles()
    {
        return $this->hasMany(EmployeeRole::class);
    }

    public function isPresident()
    {
        return $this->employeeRoles->contains(function ($role) {
            return $role->role->name === 'Presidente';
        });
    }
}
