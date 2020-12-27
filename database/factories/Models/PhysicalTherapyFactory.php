<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\PhysicalTherapy;

class PhysicalTherapyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhysicalTherapy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'diagnosis' => $this->faker->text,
            'treatment_plan' => $this->faker->text,
            'treatment_start_date' => $this->faker->date(),
        ];
    }
}
