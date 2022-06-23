<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this->call(StudentSeeder::class);
        $this->call(FamiliaSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PetSeeder::class);
    }
}
