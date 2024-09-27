<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'status_id' => 1,
            ],
            [
                'name' => 'Empleado',
                'status_id' => 1,
            ],
            [
                'name' => 'Colaborador',
                'status_id' => 1,
            ],
            [
                'name' => 'Gerente',
                'status_id' => 1,
            ],
            [
                'name' => 'Jefe',
                'status_id' => 1,
            ],
            [
                'name' => 'Presidente',
                'status_id' => 1,
            ],
        ]);
    }
}
