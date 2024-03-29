<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id'=>User::all()->random()->id,
            'cname'=>fake()->company(),
            'slug'=>str_slug('name'),
            'address'=>fake()->address(),
            'phone'=>fake()->phoneNumber(),
            'website'=>fake()->domainName(),
            'logo'=>'avatar\profile.jpg',
            'cover_photo'=>'cover\cover.jpg',
            'slogan'=>'learn-earn and grow',
            'description'=>fake()->paragraph(rand(2,10))
        ];
    }
}
