<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentals>
 */
class RentalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            //'book_id' => Book::factory(),
            'rental_date' => fake()->dateTimeBetween(),
            'return_date' => fake()->dateTimeBetween()
        ];
    }
}
