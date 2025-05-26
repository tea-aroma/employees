<?php

namespace Database\Seeders;


use App\Models\CompanyCarsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CompanyCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyCarsModel::factory(10)->create();
    }
}
