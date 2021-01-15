<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::all()->random()->id,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'title' => $this->faker->jobTitle,
            'phone' => (int) $this->faker->phoneNumber,
            'hired' => $this->faker->boolean,
        ];
    }
}
