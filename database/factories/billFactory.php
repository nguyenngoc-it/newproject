<?php

namespace Database\Factories;

use App\Models\bill;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class billFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $product= Product::pluck('id')->toArray();
        $customer= Customer::pluck('id')->toArray();
        return [
        'product_id'=>$this->faker->randomElement($product),
            'customer_id'=>$this->faker->randomElement($customer),
            'amount'=>$this->faker->randomElement([1,2,3]),
            'price'=>$this->faker->randomElement([100,200]),
            'total_money'=>$this->faker->randomElement([100,200,300])



        ];
    }
}
