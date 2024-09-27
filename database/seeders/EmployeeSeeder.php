<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->insert([
            [
                //presidente
                'first_name' => "Ana",
                'last_name' => "López",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Carlos",
                'last_name' => "Gómez",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Luisa",
                'last_name' => "Pérez",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Diego",
                'last_name' => "Martínez",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Sofía",
                'last_name' => "Ramírez",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Jorge",
                'last_name' => "Hernández",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "María",
                'last_name' => "Vargas",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Pablo",
                'last_name' => "Rojas",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Carmen",
                'last_name' => "Torres",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
            [
                'first_name' => "Pedro",
                'last_name' => "Fernández",
                'identification' => "1234567890",
                'address' => "Cra. 15 Bis #39 A 27, Bogotá",
                'phone' => "30000000000",
                'city_id' => 83
            ],
        ]);
    }
}
