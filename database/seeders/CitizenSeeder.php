<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('citizens')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'neighborhood' => 'Downtown',
            'chief_neighborhood' => 'Chief Smith',
            'phone' => '1234567890',
            'id_number' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

