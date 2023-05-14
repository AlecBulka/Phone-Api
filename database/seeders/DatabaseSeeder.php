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
            'price' => 1009
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
            'internalStorage' => 1000,
            'batteryCapacity' => 5000,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1829
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
            'price' => 959
        ]);

        Phone::create([
            'name' => 'iPhone 14 Pro Max',
            'brand' => 'Apple',
            'os' => 'iOS 16',
            'cpu' => 'Apple A16 Bionic',
            'gpu' => 'Apple GPU',
            'screenSize' => 6.7,
            'resolution' => '1290 x 2796 pixels',
            'cameraMegapixels' => 48,
            'cameraQuality' => '4K@24/25/30/60fps, 1080p@25/30/60/120/240fps',
            'ram' => 6,
            'internalStorage' => 512,
            'batteryCapacity' => 4323,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1859
        ]);

        Phone::create([
            'name' => 'iPhone 12',
            'brand' => 'Apple',
            'os' => 'iOS 14.1',
            'cpu' => 'Apple A14 Bionic',
            'gpu' => 'Apple GPU',
            'screenSize' => 6.1,
            'resolution' => '1170 x 2532 pixels',
            'cameraMegapixels' => 12,
            'cameraQuality' => '4K@24/30/60fps, 1080p@30/60/120/240fps',
            'ram' => 4,
            'internalStorage' => 64,
            'batteryCapacity' => 2815,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 809
        ]);

        Phone::create([
            'name' => 'iPhone 13',
            'brand' => 'Apple',
            'os' => 'iOS 15',
            'cpu' => 'Apple A15 Bionic',
            'gpu' => 'Apple GPU',
            'screenSize' => 6.1,
            'resolution' => '1170 x 2532 pixels',
            'cameraMegapixels' => 12,
            'cameraQuality' => '4K@24/30/60fps, 1080p@30/60/120/240fps',
            'ram' => 4,
            'internalStorage' => 256,
            'batteryCapacity' => 3240,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1029
        ]);

        Phone::create([
            'name' => 'Samsung Galaxy Z Fold4',
            'brand' => 'Samsung',
            'os' => 'Android 12L',
            'cpu' => 'Qualcomm SM8475 Snapdragon 8+ Gen 1',
            'gpu' => 'Adreno 730',
            'screenSize' => 7.6,
            'resolution' => '1812 x 2176 pixels',
            'cameraMegapixels' => 50,
            'cameraQuality' => '8K@24fps, 4K@60fps, 1080p@60/240fps (gyro-EIS)',
            'ram' => 12,
            'internalStorage' => 256,
            'batteryCapacity' => 4400,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1799
        ]);

        Phone::create([
            'name' => 'Samsung Galaxy Z Flip4',
            'brand' => 'Samsung',
            'os' => 'Android 12',
            'cpu' => 'Qualcomm SM8475 Snapdragon 8+ Gen 1',
            'gpu' => 'Adreno 730',
            'screenSize' => 6.7,
            'resolution' => '1080 x 2640 pixels',
            'cameraMegapixels' => 12,
            'cameraQuality' => '4K@30/60fps, 1080p@60/240fps',
            'ram' => 8,
            'internalStorage' => 512,
            'batteryCapacity' => 3700,
            'simType' => 'Nano-SIM and eSIM',
            'price' => 1279
        ]);

    }
}
