<?php

namespace Database\Factories;

use App\Models\Fund;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    protected $model = Fund::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company().' Fund',
            'start_year' => $this->faker->year(),
            'manager_id' => Manager::factory(),
        ];
    }
}
