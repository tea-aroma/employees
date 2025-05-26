<?php

namespace Database\Seeders;

use App\Models\ScheduleStatusesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new ScheduleStatusesModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Unknown', 'code' => 'unknown' ],
            [ 'id' => 2, 'name' => 'Pending', 'code' => 'pending' ],
            [ 'id' => 3, 'name' => 'Confirmed', 'code' => 'confirmed' ],
            [ 'id' => 4, 'name' => 'Cancelled', 'code' => 'cancelled' ],
            [ 'id' => 5, 'name' => 'Completed', 'code' => 'completed' ],
        ];
    }
}
