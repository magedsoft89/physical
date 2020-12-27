<?php

namespace Database\Seeders;

use App\Models\TreatmentSession;
use Illuminate\Database\Seeder;

class TreatmentSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreatmentSession::factory()->count(5)->create();
    }
}
