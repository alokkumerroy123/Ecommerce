<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'price'=>$this->faker->randomNumber(3),
            'discount'=>$this->faker->randomNumber(2),
            'description'=>$this->faker->realText(300),
            'photo'=>$this->faker->imageUrl(),
        ];
    }
}
