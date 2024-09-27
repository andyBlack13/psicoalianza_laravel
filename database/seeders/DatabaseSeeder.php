<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\EmployeeRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            EmployeeSeeder::class,
            StatusSeeder::class,
            RolesSeeder::class,
            EmployeeRoleSeeder::class
        ]);
    }
}
