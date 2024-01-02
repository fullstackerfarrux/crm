<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::create([
            'student_name' => "Javohir",
            'parent_name' => "Abdulloh",
            'stack' => "Matematika",
            'student_phone' => "+998911629494",
            'parent_phone' => "+998943663122",
        ]);
    }
}
