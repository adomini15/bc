<?php

namespace Database\Seeders;

use App\Models\Beautician;
use Illuminate\Database\Seeder;

class BeauticianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beautician::factory()
        ->count(10)
        ->create();
    }
}
