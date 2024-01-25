<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::all()->random()->id,
            'company_id'=>Company::all()->random()->id,
            'title'=>fake()->title(),
            'slug'=>str_slug('title'),
            'description'=>fake()->paragraph(rand(2,10)),
            'roles'=>fake()->sentence(3),
            'category_id'=>rand(1,5),
            'position'=>fake()->jobTitle(),
            'address'=>fake()->address(),
            'type'=>fake()->randomElement(['fulltime','partime','remote']),
            'status'=>rand(0,1),
            'last_date'=>fake()->dateTime(),
            'number_of_vacany'=>rand(1,10),
            'experience'=>rand(1,10),
            'gender'=>fake()->randomElement(['male','female']),
            'salary'=>rand(10000,50000)
        ];
    }
}
