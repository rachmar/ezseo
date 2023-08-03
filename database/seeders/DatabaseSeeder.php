<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Rachmar Mohammad',
            'email' => 'rachmar.dev@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        $this->call(ClassroomDivisionSeeder::class);
        $this->call(ClassroomSemesterSeeder::class);
        $this->call(ClassroomTermSeeder::class);
    }
}
