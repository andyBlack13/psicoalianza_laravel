<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employee_role')->insert([
            [
                'employee_id' => 1, // ana
                'role_id' => 1, // presidente
                'position' => 'Presidente',
                'area' => 'Administración',
                'manager_id' => null
            ],
            [
                'employee_id' => 2, // carlos
                'role_id' => 2, // gerente
                'position' => 'Gerente',
                'area' => 'Ventas',
                'manager_id' => 1
            ],
            [
                'employee_id' => 3, // luisa
                'role_id' => 2, // gerente
                'position' => 'Gerente',
                'area' => 'Finanzas',
                'manager_id' => 1
            ],
            [
                'employee_id' => 4, // diego
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Ventas',
                'manager_id' => 2
            ],
            [
                'employee_id' => 5, // sofia 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Finanzas',
                'manager_id' => 3
            ],
            [
                'employee_id' => 6, // jorge 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Ventas',
                'manager_id' => 2
            ],
            [
                'employee_id' => 7, // maría 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Finanzas',
                'manager_id' => 3
            ],
            [
                'employee_id' => 8, // pablo 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Ventas',
                'manager_id' => 2
            ],
            [
                'employee_id' => 9, // carmen 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Finanzas',
                'manager_id' => 3
            ],
            [
                'employee_id' => 10, // pedro 
                'role_id' => 3, // empleado
                'position' => 'Empleado',
                'area' => 'Ventas',
                'manager_id' => 2
            ],
        ]);
    }
}
