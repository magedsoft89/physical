<?php

namespace Database\Seeders;

use App\Models\ClinicalSigns;
use Illuminate\Database\Seeder;

class ClinicalSignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClinicalSigns::factory()->count(5)->create();
    }
}
