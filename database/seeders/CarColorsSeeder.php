<?php

namespace Database\Seeders;

use App\Models\CarColorsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarColorsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Red', 'code' => 'red' ],
            [ 'id' => 3, 'name' => 'Blue', 'code' => 'blue' ],
            [ 'id' => 4, 'name' => 'Green', 'code' => 'green' ],
            [ 'id' => 5, 'name' => 'Yellow', 'code' => 'yellow' ],
            [ 'id' => 6, 'name' => 'Black', 'code' => 'black' ],
        ];
    }
}
