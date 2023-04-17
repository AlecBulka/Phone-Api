<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'test',
            'brand' => 'test',
            'os' => 'test',
            'cpu' => 'test',
            'gpu' => 'test',
            'screenSize' => 7.4,
            'resolution' => 'test',
            'cameraMegapixels' => 34,
            'cameraQuality' => 'test',
            'ram' => 12,
            'internalStorage' => 222,
            'batteryCapacity' => 342,
            'simType' => 'test',
            'price' => 1299.99
        ];
    }
}
