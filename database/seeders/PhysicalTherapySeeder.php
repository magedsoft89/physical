<?php

namespace Database\Seeders;

use App\Models\PhysicalTherapy;
use Illuminate\Database\Seeder;

class PhysicalTherapySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicalTherapy::factory()->count(5)->create();
    }
}
