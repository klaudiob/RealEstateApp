<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween( '-2 month', '-1 month');
        $endDate = $this->faker->dateTimeBetween('-1 month' ,'+1 month');

        return [
            "title"=>$this->faker->text(50),
            "address"=>$this->faker->text(50),
            "city"=>$this->faker->text(50),
            "country"=>$this->faker->text(50),
            'image'=>"image.jpeg",
            "type"=>$this->faker->text(50),
            "description"=>$this->faker->sentence(10),
            "price"=>$this->faker->randomFloat(2,50,1000),
            "startDate"=>Carbon::parse($startDate)->format("Y-m-d"),
            "endDate"=>Carbon::parse($endDate)->format("Y-m-d"),
            "user_id"=>User::inRandomOrder()->first()->id,


        ];
    }
}
