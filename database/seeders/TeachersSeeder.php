<?php

namespace Database\Seeders;

use App\Models\Teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teachers::create([
            'teacher_name' => "Farrux",
            'teacher_phone' => "+998903152006",
            'teacher_photo' => "photos/user.png",
        ]);
    }
}
