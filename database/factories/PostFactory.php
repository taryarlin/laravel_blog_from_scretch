<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->company();

        return [
            'author_id' => $this->faker->numberBetween(1, 5),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => implode(' ', $this->faker->sentences(4)),
            'profile' => $this->faker->imageUrl(640, 480)
        ];
    }
}
