<?php

namespace Database\Seeders;

use App\Models\CarComfortsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarComfortsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarComfortsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Economy', 'code' => 'economy' ],
            [ 'id' => 3, 'name' => 'Standard', 'code' => 'standard' ],
            [ 'id' => 4, 'name' => 'Comfort', 'code' => 'comfort' ],
            [ 'id' => 5, 'name' => 'Business', 'code' => 'business' ],
            [ 'id' => 6, 'name' => 'Luxury', 'code' => 'luxury' ],
        ];
    }
}
