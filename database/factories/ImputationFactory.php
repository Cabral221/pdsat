<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Domains\Imputation\Models\Imputation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImputationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imputation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sick_name' => $this->faker->name(),
            'agent' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail(),
            'registration_number' => $this->faker->word,
            'service' => $this->faker->word,
            'fonction' => 'Informaticien',
        ];
    }
}
