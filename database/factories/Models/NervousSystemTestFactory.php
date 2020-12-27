<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\NervousSystemTest;
use App\Models\Patient;

class NervousSystemTestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NervousSystemTest::class;

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
            'muscles_reflections' => $this->faker->text,
            'surface_reflections' => $this->faker->text,
            'light_touch' => $this->faker->word,
            'pain' => $this->faker->word,
            'heat' => $this->faker->word,
            'two_points' => $this->faker->word,
            'sensory_discrimination' => $this->faker->word,
            'vibration' => $this->faker->word,
            'postures' => $this->faker->word,
            'glasgow' => $this->faker->word,
            'orientation' => $this->faker->word,
            'attention' => $this->faker->word,
            'memory' => $this->faker->word,
            'calculation' => $this->faker->word,
            'judgment' => $this->faker->word,
            'food' => $this->faker->word,
            'clothes' => $this->faker->word,
            'bathroom' => $this->faker->word,
            'toilet' => $this->faker->word,
            'moving' => $this->faker->word,
            'listening' => $this->faker->word,
            'reading' => $this->faker->word,
            'speaking' => $this->faker->word,
            'writing' => $this->faker->word,
            'walking_pattern' => $this->faker->word,
            'meningitics_signs' => $this->faker->word,
            'cerebellous_signs' => $this->faker->word,
        ];
    }
}
