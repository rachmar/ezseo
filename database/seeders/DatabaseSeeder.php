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
        \App\Models\User::create([
            'name' => 'Rachmar Mohammad',
            'email' => 'rachmar.dev@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        \App\Models\Company::create([
            'owner_id' => 1,
            'name' => 'Sex Toy Stores',
            'project_id' => '341c89fe-24f0-4265-8c1f-ba993b277d0c',
            'auth_token' => 'PT5815ba2ad1fdb4cbfd59c5a5fe5c308b721d373231757abc',
            'space_url' => 'riztheseowiz.signalwire.com'
        ]);

    }
}
