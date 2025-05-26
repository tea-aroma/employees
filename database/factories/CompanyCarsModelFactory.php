<?php

namespace Database\Factories;

use App\Models\CompanyCarsModel;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyCarsModel>
 */
class CompanyCarsModelFactory extends Factory
{
    /**
     * @var class-string<CompanyCarsModel>
     */
    protected $model = CompanyCarsModel::class;

    /**
     * @var int
     */
    protected static int $sortOrder = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$sortOrder += 10;

        return [
            'car_id' => $this->faker->numberBetween(1, 10),
            'employee_id' => $this->faker->numberBetween(1, 40),
            'car_status_id' => $this->faker->numberBetween(1, 4),
            'car_color_id' => $this->faker->numberBetween(1, 6),
            'license_plate' => $this->faker->ean8(),
            'vin' => $this->faker->numberBetween(111111, 999999),
            'mileage' => $this->faker->numberBetween(1000, 99999),
            'year' => $this->faker->year,
            'sort_order' => self::$sortOrder,
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
