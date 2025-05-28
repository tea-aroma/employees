<?php

namespace Database\Factories;


use App\Models\PositionsToCarComfortsModel;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PositionsToCarComfortsModelFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = PositionsToCarComfortsModel::class;

    /**
     * @var array
     */
    protected static array $uniquePairs = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (empty(static::$uniquePairs))
        {
            static::$uniquePairs = collect(range(1, 6))->crossJoin(range(1, 6))->shuffle()->all();
        }

        $pair = array_pop(static::$uniquePairs);

        return [ 'position_id' => $pair[ 0 ], 'car_comfort_id' => $pair[ 1 ], ];
    }
}
