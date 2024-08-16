<?php

namespace Database\Seeders;

use App\Models\Temperature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemperatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temperatures = [
            [
                'Temperature_id' => '10-30%',
                'keterangan' => 'bawah'
            ],
            [
                'Temperature_id' => '50-60%',
                'keterangan' => 'atas'
            ],
            [
                'Temperature_id' => 'Perusahaan',
                'keterangan' => 'wanita'
            ],
            [
                'Temperature_id' => 'Pribadi',
                'keterangan' => 'pria'
            ],
        ];

        foreach ($temperatures as $temperature) {
            Temperature::create($temperature);
        }
    }
}
