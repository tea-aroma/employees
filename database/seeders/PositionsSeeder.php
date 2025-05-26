<?php

namespace Database\Seeders;

use App\Models\PositionsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new PositionsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Manager', 'code' => 'manager' ],
            [ 'id' => 3, 'name' => 'Developer', 'code' => 'developer' ],
            [ 'id' => 4, 'name' => 'Accountant', 'code' => 'accountant' ],
            [ 'id' => 5, 'name' => 'Salesperson', 'code' => 'salesperson' ],
            [ 'id' => 6, 'name' => 'HR Specialist', 'code' => 'hr_specialist' ],
        ];
    }
}
