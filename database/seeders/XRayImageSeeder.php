<?php

namespace Database\Seeders;

use App\Models\XRayImage;
use Illuminate\Database\Seeder;

class XRayImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XRayImage::factory()->count(5)->create();
    }
}
