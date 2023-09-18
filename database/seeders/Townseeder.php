<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Townseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
   
    
        // {
         \App\Models\Town::factory(count:10)->create();

         \App\Models\Town::factory()->create([
            'name' => 'Langata',
             ]);
    
    }
    }

