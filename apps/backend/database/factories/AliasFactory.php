<?php

namespace Database\Factories;

use App\Models\Alias;
use App\Models\Fund;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alias>
 */
class AliasFactory extends Factory
{
    protected $model = Alias::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'fund_id' => Fund::factory(),
        ];
    }
}
