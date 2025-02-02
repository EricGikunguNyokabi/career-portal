<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->jobTitle(),
            'position_needed' => $this->faker->numberBetween(1, 20),
            'job_grade' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J']),
            'advert_no' => $this->faker->unique()->word(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
