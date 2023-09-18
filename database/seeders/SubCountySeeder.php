<?php

namespace Database\Seeders;

use App\Models\SubCounty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
         \App\Models\SubCounty::factory(10)->create();

         \App\Models\SubCounty::factory()->create([
            'name' => 'Langata',
             ]);
    
    }
}
