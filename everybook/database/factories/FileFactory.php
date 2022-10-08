<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => Post::all()->random()->id,
            'up_name' => fake()->sentence(),
            'real_name' => fake()->sentence(),
            'size' => 0,
            'extension' => 'jpg',
            'download' => 0,
            'width' => 0,
            'height' => 0,
        ];
    }
}
