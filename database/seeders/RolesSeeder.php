<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Roles::factory(10)->create();

         \App\Models\Roles::factory()->create([
            'name' => 'Parking',
             ]);
    }
}
