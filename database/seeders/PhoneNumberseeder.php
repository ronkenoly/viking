<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhoneNumber;

class PhoneNumberseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            \App\Models\PhoneNumber::factory(count:10)->create();
            
            \App\Models\PhoneNumber::factory()->create([
                'PhoneNumber' => '0797412046' ,
                ]);
       
    }
}
