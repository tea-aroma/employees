<?php

namespace Database\Factories;

use App\Models\EmployeesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeesModel>
 */
class EmployeesModelFactory extends Factory
{
    /**
     * @var class-string<EmployeesModel>
     */
    protected $model = EmployeesModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'position_id' => $this->faker->numberBetween(1, 6),
            'department_id' => $this->faker->numberBetween(1, 5),
            'employee_status_id' => $this->faker->numberBetween(1, 6),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'patronymic' => $this->faker->optional()->firstNameMale,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'hire_date' => $this->faker->dateTimeBetween('-10 years'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
