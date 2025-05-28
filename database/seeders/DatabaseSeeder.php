<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PositionsSeeder::class);

        $this->call(DepartmentsSeeder::class);

        $this->call(EmployeeStatusesSeeder::class);

        $this->call(CarBrandsSeeder::class);

        $this->call(CarColorsSeeder::class);

        $this->call(CarModelsSeeder::class);

        $this->call(CarTypesSeeder::class);

        $this->call(CarComfortsSeeder::class);

        $this->call(CarStatusesSeeder::class);

        $this->call(TripTypesSeeder::class);

        $this->call(ScheduleStatusesSeeder::class);

        $this->call(CarsSeeder::class);

        $this->call(EmployeesSeeder::class);

        $this->call(CompanyCarsSeeder::class);

        $this->call(PositionsToCarComfortsSeeder::class);
    }

    /**
     * Creates records by the specified arguments.
     *
     * @param array $records
     * @param Model $model
     *
     * @return void
     */
    public static function createRecords(array $records, Model $model): void
    {
        foreach ($records as $record)
        {
            $model->newQuery()->create($record);
        }
    }
}
