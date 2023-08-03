<?php

namespace Database\Seeders;

use App\Models\ClassroomSemester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $semester = new ClassroomSemester();
        $semester->name = '1st Sem';
        $semester->save();

        $semester = new ClassroomSemester();
        $semester->name = '2nd Sem';
        $semester->save();

        $semester = new ClassroomSemester();
        $semester->name = '3rd Sem';
        $semester->save();

        $semester = new ClassroomSemester();
        $semester->name = 'Full Year';
        $semester->save();

        $semester = new ClassroomSemester();
        $semester->name = 'Summer';
        $semester->save();
    }
}
