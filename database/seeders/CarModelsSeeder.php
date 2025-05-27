<?php

namespace Database\Seeders;

use App\Models\CarModelsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarModelsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown A', 'code' => 'unknown-a' ],
            [ 'id' => 2, 'name' => 'Unknown B', 'code' => 'unknown-b' ],
            [ 'id' => 3, 'name' => 'BMW 3 Series', 'code' => 'bmw-3=series' ],
            [ 'id' => 4, 'name' => 'BMW X5', 'code' => 'bmw-x5' ],
            [ 'id' => 5, 'name' => 'Honda Civic', 'code' => 'honda-civic' ],
            [ 'id' => 6, 'name' => 'Honda CR-V', 'code' => 'honda-cr-v' ],
            [ 'id' => 7, 'name' => 'Ford Focus', 'code' => 'ford-focus' ],
            [ 'id' => 8, 'name' => 'Ford Explorer', 'code' => 'ford-explorer' ],
            [ 'id' => 9, 'name' => 'Mercedes-Benz C-Class', 'code' => 'mercedes-benz-c-class' ],
            [ 'id' => 10, 'name' => 'Mercedes-Benz GLE', 'code' => 'mercedes-benz-gle' ],
            [ 'id' => 11, 'name' => 'Toyota Corolla', 'code' => 'toyota-corolla' ],
            [ 'id' => 12, 'name' => 'Toyota Camry', 'code' => 'toyota-camry' ],
        ];
    }
}
