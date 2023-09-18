<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database;
/** 
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class TownFactory extends Factory
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
           'name' => fake()->Town(),        
              
        ];
    }
}