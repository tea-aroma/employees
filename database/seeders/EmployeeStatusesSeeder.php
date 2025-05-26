<?php

namespace Database\Seeders;

use App\Models\EmployeeStatusesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new EmployeeStatusesModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Active', 'code' => 'active' ],
            [ 'id' => 3, 'name' => 'On Leave', 'code' => 'on-leave' ],
            [ 'id' => 4, 'name' => 'Suspended', 'code' => 'suspended' ],
            [ 'id' => 5, 'name' => 'Terminated', 'code' => 'terminated' ],
            [ 'id' => 6, 'name' => 'Probation', 'code' => 'probation' ],
        ];
    }
}
