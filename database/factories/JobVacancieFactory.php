<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancie>
 */
class JobVacancieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ['Presencial', 'Remoto', 'Hibrido'];
        $modality = ['Freelancer', 'PJ', 'CLT'];

        return [
            'title' => $this->faker->jobTitle,
            'modality' => $modality[rand(0, 2)],
            'type' => $type[rand(0, 2)],
            'salary' => $this->faker->buildingNumber,
            'image' => $this->faker->imageUrl(640, 640, 'job', true, 'Faker'),
            'description' => $this->faker->jobTitle,
            'address_id' => rand(0, 20)
        ];
    }
}
