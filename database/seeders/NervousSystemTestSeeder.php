<?php

namespace Database\Seeders;

use App\Models\NervousSystemTest;
use Illuminate\Database\Seeder;

class NervousSystemTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NervousSystemTest::factory()->count(5)->create();
    }
}
