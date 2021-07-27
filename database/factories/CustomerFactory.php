<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->name(),
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'gender'=>$this->faker->randomElement(['male','female']),
            'phone_number'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->address(),
            'point'=>$this->faker->randomElement([1,2])



        ];
    }
}
