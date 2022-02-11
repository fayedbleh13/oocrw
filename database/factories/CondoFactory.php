<?php

namespace Database\Factories;

use App\Models\condo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CondoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = condo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $condo_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($condo_name);
        return [
            'name' => $condo_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'price' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
