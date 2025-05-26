<?php

namespace Database\Seeders;

use App\Models\CarBrandsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new CarBrandsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'BMW', 'code' => 'bmw' ],
            [ 'id' => 3, 'name' => 'Honda', 'code' => 'honda' ],
            [ 'id' => 4, 'name' => 'Ford', 'code' => 'ford' ],
            [ 'id' => 5, 'name' => 'Mercedes', 'code' => 'mercedes' ],
            [ 'id' => 6, 'name' => 'Toyota', 'code' => 'toyota' ],
        ];
    }
}
