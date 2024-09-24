<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(100, 100, 'business'),  // 100x100 placeholder logo
            'email' => $this->faker->unique()->companyEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
