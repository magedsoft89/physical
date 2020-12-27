<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LaboratoryTest;
use App\Models\Patient;

class LaboratoryTestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaboratoryTest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'test_date' => $this->faker->date(),
            'leukocyte_count' => $this->faker->word,
            'neutrophils' => $this->faker->word,
            'lymphocyte' => $this->faker->word,
            'eosinophil' => $this->faker->word,
            'basophil' => $this->faker->word,
            'monocytes' => $this->faker->word,
            'erythrocytes' => $this->faker->word,
            'haemoglobin' => $this->faker->word,
            'hematocrit' => $this->faker->word,
            'sugar' => $this->faker->word,
            'esr_low' => $this->faker->word,
            'esr_heigh' => $this->faker->word,
            'urea' => $this->faker->word,
            'creatine' => $this->faker->word,
            'alkaline_phosphatase' => $this->faker->word,
            'phosphorus' => $this->faker->word,
            'calcium' => $this->faker->word,
            'triglyceride' => $this->faker->word,
            'cholesterol' => $this->faker->word,
            'uric_acid' => $this->faker->word,
            'wright_test' => $this->faker->word,
            'widal' => $this->faker->word,
            'urine_color' => $this->faker->word,
            'specific_gravity' => $this->faker->word,
            'urine_ph' => $this->faker->word,
            'urine_leukocyte' => $this->faker->word,
            'urine_erythrocytes' => $this->faker->word,
            'sediment' => $this->faker->word,
            'oxaluria' => $this->faker->word,
            'urine_haemoglobin' => $this->faker->word,
            'germ' => $this->faker->word,
            'allergy' => $this->faker->word,
            'others' => $this->faker->text,
        ];
    }
}
