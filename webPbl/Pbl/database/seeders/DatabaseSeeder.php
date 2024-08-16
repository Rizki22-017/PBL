<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Instansi;
use App\Models\Temperature;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\InstansiSeeder;
use Database\Factories\InstansiFactory;
use Database\Seeders\TemperatureSeeder;

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

        //seeder
        $this->call(TemperatureSeeder::class);
        $this->call(InstansiSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PersyaratanSeeder::class);
        $this->call(SensorDataSeeder::class);

        //factory
        Instansi::factory(25)->create();
        // InstansiFactory::new()->count(10)->create();
    }
}
