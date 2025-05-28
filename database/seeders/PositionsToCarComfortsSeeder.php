<?php

namespace Database\Seeders;

use App\Models\PositionsToCarComfortsModel;
use Illuminate\Database\Seeder;

class PositionsToCarComfortsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PositionsToCarComfortsModel::factory()->count(20)->create();
    }
}
