<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\student;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'npm' => student::select('npm')->orderByRaw("RAND()")->first()->npm,
            'type_id' => 1,
            'amount' => $this->faker->numberBetween(50000, 500000),
            'created_at' => $this->faker->dateTimeBetween('2021-03-01 00:00:00', 'now'),
        ];
    }
}
