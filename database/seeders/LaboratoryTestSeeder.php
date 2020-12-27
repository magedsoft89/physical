<?php

namespace Database\Seeders;

use App\Models\LaboratoryTest;
use Illuminate\Database\Seeder;

class LaboratoryTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LaboratoryTest::factory()->count(5)->create();
    }
}
