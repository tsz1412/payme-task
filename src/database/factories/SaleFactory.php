<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(),
            'currency' => 'ILS',
            'sale_number' => $this->faker->randomNumber('9'),
            'payment_link' => 'https://foo.co.il',
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),

        ];
    }
}
