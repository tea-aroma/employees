<?php

namespace Database\Factories;

use App\Models\CarsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarsModel>
 */
class CarsModelFactory extends Factory
{
    /**
     * @var class-string<CarsModel>
     */
    protected $model = CarsModel::class;

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
            'car_model_id' => $this->faker->numberBetween(1, 12),
            'car_type_id' => $this->faker->numberBetween(1, 6),
            'car_comfort_id' => $this->faker->numberBetween(1, 6),
            'sort_order' => self::$sortOrder,
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
