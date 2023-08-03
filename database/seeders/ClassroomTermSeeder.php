<?php

namespace Database\Seeders;

use App\Models\ClassroomTerm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $term = new ClassroomTerm();
        $term->name = '2023-2024';
        $term->save();

        $term = new ClassroomTerm();
        $term->name = '2024-2025';
        $term->save();

        $term = new ClassroomTerm();
        $term->name = '2025-2026';
        $term->save();

        $term = new ClassroomTerm();
        $term->name = '2026-2027';
        $term->save();

        $term = new ClassroomTerm();
        $term->name = '2027-2028';
        $term->save();

    }
}
