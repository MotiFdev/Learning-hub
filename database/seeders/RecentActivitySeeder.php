<?php

namespace Database\Seeders;

use App\Models\RecentActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecentActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RecentActivity::factory(20)->create();
    }
}
