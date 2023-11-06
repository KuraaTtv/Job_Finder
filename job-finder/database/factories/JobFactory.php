<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_name'=>$this->faker->name,
            'tags'=>'laravel,php,javascript',
            'company'=>$this->faker->company(),
            'city'=>$this->faker->city(),
            'email'=>$this->faker->email(),
            'website'=>$this->faker->url(),
            'description'=> $this->faker->paragraph(5),
        ];
    }
}
