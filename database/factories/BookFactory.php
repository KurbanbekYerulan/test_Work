<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Book::class;

    public function definition(): array
    {
        $image = $this->faker->image('public/books', 400, 300, null, false);
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'cover' => $image,
            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
