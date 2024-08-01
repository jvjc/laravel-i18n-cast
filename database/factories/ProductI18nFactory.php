<?php

namespace Database\Factories;

use App\Models\ProductI18n;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductI18nFactory extends Factory
{
    protected $model = ProductI18n::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale' => 'en',
            'name' => 'en:'.$this->faker->word(),
            'description' => 'en:'.$this->faker->sentence(),
        ];
    }
}
