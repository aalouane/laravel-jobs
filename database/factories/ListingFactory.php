<?php

namespace Database\Factories;

use Faker\Provider\ar_EG\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'email' => fake()->unique()->safeEmail(),
            'company' => fake()->company(),
            'tags'=>"Laravel, api, php",
            'location' => fake()->locale(),
            'website' => fake()->url(),
            'description' => fake()->paragraph(5),
        ];
    }
}
