<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 할 일 30개 만들어서 넣기
        Todo::factory()
            ->count(30)
            ->create();
    }
}
