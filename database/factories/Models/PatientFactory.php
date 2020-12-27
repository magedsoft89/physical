<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'nick_name' => $this->faker->word,
            'patient_code' => $this->faker->word,
            'gender' => $this->faker->randomElement(["male","female"]),
            'kids_count' => $this->faker->numberBetween(1, 5),
            'little_kid_old' => $this->faker->numberBetween(1, 9),
            'DOB' => $this->faker->date(),
            'weight' => $this->faker->numberBetween(40, 150),
            'height' => $this->faker->numberBetween(100, 195),
            'address' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'job' => $this->faker->word,
            'personal_habits' => $this->faker->word,
            'referring_doctor' => $this->faker->word,
            'notes' => $this->faker->text,
        ];
    }
}
