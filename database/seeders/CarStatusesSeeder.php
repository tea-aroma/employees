<?php

namespace Database\Seeders;

use App\Models\CarStatusesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarStatusesModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Available', 'code' => 'available' ],
            [ 'id' => 3, 'name' => 'Maintenance', 'code' => 'maintenance' ],
            [ 'id' => 4, 'name' => 'Decommissioned', 'code' => 'decommissioned' ],
        ];
    }
}
