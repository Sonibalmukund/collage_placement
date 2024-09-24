<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Jobs::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'title' => $this->faker->word,
            'position'=>$this->faker->word,
            'vacancy'=> $this->faker->randomNumber(),
            'location' => $this->faker->city,
            'type' => $this->faker->randomElement(['full-time', 'part-time']),
            'salary' => $this->faker->randomNumber(1,2),
            'description' => $this->faker->paragraph,
            'application_deadline'=>$this->faker->date(),

        ];
    }
}
