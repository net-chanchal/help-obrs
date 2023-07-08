<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ebook>
 */
class EbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'title' => $this->faker->text(40),
            'slug' => $this->faker->slug,
            'writer' => $this->faker->name,
            'publisher' => $this->faker->company,
            'edition' => $this->faker->numerify('###-###-###'),
            'pages' => $this->faker->numberBetween(100, 900),
            'price' => $this->faker->numberBetween(200, 3000),
            'language' => $this->faker->languageCode,
            'book_url' => $this->faker->imageUrl,
            'summary' => $this->faker->paragraph(5),
            'status' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
