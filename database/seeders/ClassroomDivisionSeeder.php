<?php

namespace Database\Seeders;

use App\Models\ClassroomDivision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $division = new ClassroomDivision();
        $division->name = 'Basic Education';
        $division->save();

        $division = new ClassroomDivision();
        $division->name = 'Senior High';
        $division->save();

        $division = new ClassroomDivision();
        $division->name = 'College';
        $division->save();

    }
}
