<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ClinicalSigns;
use App\Models\Visit;

class ClinicalSignsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClinicalSigns::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visit_id' => Visit::factory(),
            'pressure_heigher' => $this->faker->randomNumber(),
            'pressure_lower' => $this->faker->randomNumber(),
            'pulse' => $this->faker->randomNumber(),
            'breathing' => $this->faker->randomNumber(),
            'temperature' => $this->faker->randomNumber(),
            'head' => $this->faker->word,
            'neck' => $this->faker->word,
            'abdomen' => $this->faker->word,
            'heart' => $this->faker->word,
            'urinary_system' => $this->faker->word,
            'lymphatic_system' => $this->faker->word,
            'muscular_strength' => $this->faker->text,
            'muscle_tonic' => $this->faker->text,
            'joint_fixity' => $this->faker->word,
            'motion_range' => $this->faker->text,
            'clinical_test' => $this->faker->text,
        ];
    }
}
