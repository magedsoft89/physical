<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PhysicalTherapy;
use App\Models\TreatmentSession;

class TreatmentSessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TreatmentSession::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'physical_therapy_id' => PhysicalTherapy::factory(),
            'session_date' => $this->faker->date(),
            'applied_plan' => $this->faker->text,
            'code' => $this->faker->word,
            'notes' => $this->faker->text,
        ];
    }
}
