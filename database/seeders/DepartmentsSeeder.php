<?php

namespace Database\Seeders;

use App\Models\DepartmentsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new DepartmentsModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'IT', 'code' => 'it' ],
            [ 'id' => 3, 'name' => 'Finance', 'code' => 'finance' ],
            [ 'id' => 4, 'name' => 'Sales', 'code' => 'sales' ],
            [ 'id' => 5, 'name' => 'Marketing', 'code' => 'marketing' ],
        ];
    }
}
