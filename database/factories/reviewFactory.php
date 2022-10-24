<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class reviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->text(50),
            "description"=>$this->faker->sentence(10),
            "user_id"=>User::inRandomOrder()->first()->id,
            "property_id"=>Property::inRandomOrder()->first()->id,
        ];
    }
}
