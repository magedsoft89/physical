<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\Problem;

class ProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Problem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'main_complaint' => $this->faker->word,
            'story' => $this->faker->text,
            'first_visit_date' => $this->faker->date(),
            'previous_treatments' => $this->faker->word,
            'response_to_treatment' => $this->faker->word,
            'medical_history' => $this->faker->text,
            'surgical_history' => $this->faker->text,
            'familial_diseases' => $this->faker->text,
            'associated_diseases' => $this->faker->word,
            'current_treatments' => $this->faker->text,
            'pain_kind' => $this->faker->word,
            'pain_place' => $this->faker->word,
            'pain_severity' => $this->faker->word,
            'pain_continuity' => $this->faker->word,
            'pain_evolution' => $this->faker->word,
            'pain_time' => $this->faker->word,
            'associated_complaints' => $this->faker->text,
            'pain_spread' => $this->faker->word,
            'resulting_disability' => $this->faker->word,
            'aggravating_factors' => $this->faker->word,
            'mitigating_factors' => $this->faker->word,
            'muscle_weakness_kind' => $this->faker->word,
            'muscle_weakness_spread' => $this->faker->word,
            'sense_changing_kind' => $this->faker->word,
            'sense_changing_spread' => $this->faker->word,
            'intestinal_function' => $this->faker->word,
            'bladder_function' => $this->faker->word,
            'clinical_impression' => $this->faker->word,
            'notes' => $this->faker->text,
            'code' => $this->faker->word,
        ];
    }
}
