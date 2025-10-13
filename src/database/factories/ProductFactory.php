<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->numberBetween(500, 5000),
            'image_path' => 'https://placehold.jp/300x300.png', // 仮の画像
        ];
    }
}
