<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'npm' => '201943500' . $this->faker->numberBetween(0, 999),
            'program_faculty_id' => $this->faker->numberBetween(1, 12),
            'name' => $this->faker->name(),
            'birth' => $this->faker->date('Y-m-d', 'now'),
            'semester' => $this->faker->numberBetween(1, 8),
            'status' => 'aktif',
        ];
    }
}
