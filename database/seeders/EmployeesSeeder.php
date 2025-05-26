<?php

namespace Database\Seeders;

use App\Models\EmployeesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeesModel::factory()->count(40)->create();
    }
}
