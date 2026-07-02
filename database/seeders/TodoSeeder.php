<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    public function run(): void
    {
        $todos = [

            [
                'title' => 'Finish Laravel assignment',
                'completed' => false,
                'deadline' => '2026-07-05'
            ],

            [
                'title' => 'Create database migration',
                'completed' => true,
                'deadline' => '2026-07-06'
            ],

            [
                'title' => 'Implement authentication',
                'completed' => false,
                'deadline' => '2026-07-07'
            ],

            [
                'title' => 'Design dashboard',
                'completed' => false,
                'deadline' => '2026-07-08'
            ],

            [
                'title' => 'Write documentation',
                'completed' => false,
                'deadline' => '2026-07-09'
            ],

            [
                'title' => 'Fix validation errors',
                'completed' => true,
                'deadline' => '2026-07-10'
            ],

            [
                'title' => 'Test CRUD operations',
                'completed' => false,
                'deadline' => '2026-07-11'
            ],

            [
                'title' => 'Optimize database queries',
                'completed' => false,
                'deadline' => '2026-07-12'
            ],

            [
                'title' => 'Review project structure',
                'completed' => true,
                'deadline' => '2026-07-13'
            ],

            [
                'title' => 'Prepare final presentation',
                'completed' => false,
                'deadline' => '2026-07-14'
            ],

        ];

        foreach ($todos as $todo) {
            Todo::create($todo);
        }
    }
}
