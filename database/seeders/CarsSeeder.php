<?php

namespace Database\Seeders;

use App\Models\CarsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarsModel::factory(15)->create();
    }
}
