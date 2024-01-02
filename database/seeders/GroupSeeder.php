<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'group_stack' => 'Matematika',
            'group_day' => "DU-CHOR-JUMA",
            'group_time' => "15:00-17:00",
            'teacher_id' => 1,
        ]);
    }
}
