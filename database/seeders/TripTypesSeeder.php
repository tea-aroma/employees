<?php

namespace Database\Seeders;

use App\Models\TripTypesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseSeeder::createRecords($this->getRecords(), new TripTypesModel());
    }

    /**
     * @return array[]
     */
    protected function getRecords(): array
    {
        return [
            [ 'id' => 1, 'name' => 'Business Trip', 'code' => 'business' ],
            [ 'id' => 2, 'name' => 'Personal Errand', 'code' => 'personal' ],
            [ 'id' => 3, 'name' => 'Airport Transfer', 'code' => 'airport' ],
            [ 'id' => 4, 'name' => 'Client Meeting', 'code' => 'client_meeting' ],
            [ 'id' => 5, 'name' => 'Delivery', 'code' => 'delivery' ],
            [ 'id' => 6, 'name' => 'Maintenance', 'code' => 'maintenance' ],
            [ 'id' => 7, 'name' => 'Conference', 'code' => 'conference' ],
            [ 'id' => 8, 'name' => 'Official Visit', 'code' => 'official_visit' ],
            [ 'id' => 9, 'name' => 'Team Building', 'code' => 'team_building' ],
            [ 'id' => 10, 'name' => 'Site Inspection', 'code' => 'site_inspection' ],
        ];
    }
}
