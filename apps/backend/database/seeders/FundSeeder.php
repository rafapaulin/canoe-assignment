<?php

namespace Database\Seeders;

use App\Models\Fund;
use Illuminate\Database\Seeder;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fund::factory()
            ->hasAliases(2)
            ->hasCompanies(3)
            ->count(10)
            ->create();
    }
}
