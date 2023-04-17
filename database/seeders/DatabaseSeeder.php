<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Phone::create([
            'name' => 'iPhone 14',
            'brand' => 'Apple',
            'os' => 'iOS 16',
            'cpu' => 'Apple A15 Bionic',
            'gpu' => 'Apple GPU',
            'screenSize' => 6.1,
            'resolution' => '1170 x 2532 pixels',
            'cameraMegapixels' => 12,
            'cameraQuality' => '4K@24/25/30/60fps, 1080p@25/30/60/120/240fps',
            'ram' => 6,
            'internalStorage' => 128,
            'batteryCapacity' => 3279,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 909
        ]);

        Phone::create([
            'name' => 'Samsung Galaxy S23 Ultra',
            'brand' => 'Samsung',
            'os' => 'Android 13',
            'cpu' => 'Qualcomm SM8550-AC Snapdragon 8 Gen 2',
            'gpu' => 'Adreno 740',
            'screenSize' => 6.8,
            'resolution' => '1440 x 3088 pixels',
            'cameraMegapixels' => 200,
            'cameraQuality' => '8K@24/30fps, 4K@30/60fps, 1080p@30/60/240fps, 1080p@960fps',
            'ram' => 12,
            'internalStorage' => 256,
            'batteryCapacity' => 5000,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1589
        ]);

        Phone::create([
            'name' => 'Samsung Galaxy S23',
            'brand' => 'Samsung',
            'os' => 'Android 13',
            'cpu' => 'Qualcomm SM8550-AC Snapdragon 8 Gen 2',
            'gpu' => 'Adreno 740',
            'screenSize' => 6.1,
            'resolution' => '1080 x 2340 pixels',
            'cameraMegapixels' => 50,
            'cameraQuality' => '8K@24/30fps, 4K@30/60fps, 1080p@30/60/240fps, 1080p@960fps',
            'ram' => 8,
            'internalStorage' => 128,
            'batteryCapacity' => 3900,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 958
        ]);

    }
}
