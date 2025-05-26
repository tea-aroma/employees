<?php

namespace Database\Seeders;

use App\Models\CarTypesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarTypesModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'Unknown' ],
            [ 'id' => 2, 'name' => 'Sedan', 'code' => 'sedan' ],
            [ 'id' => 3, 'name' => 'SUV', 'code' => 'suv' ],
            [ 'id' => 4, 'name' => 'Hatchback', 'code' => 'hatchback' ],
            [ 'id' => 5, 'name' => 'Coupe', 'code' => 'coupe' ],
            [ 'id' => 6, 'name' => 'Pickup', 'code' => 'pickup' ],
        ];
    }
}
