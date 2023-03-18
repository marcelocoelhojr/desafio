<?php

namespace Database\Seeders;

use App\Models\JobVacancie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobVacanciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobVacancie::factory()->count(10)->create();
    }
}
