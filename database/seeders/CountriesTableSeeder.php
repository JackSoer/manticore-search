<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(['name' => 'United States']);
        Country::create(['name' => 'Canada']);
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Australia']);
    }
}
