<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstansiSeeder extends Seeder
{
    public function run(): void
    {
        $Instansis =  [
            [
                'id' => 'tt1746090',
                'Humidity' => '80',
                'Capacity' => '70',
                'tahun' => 2023,
                'Temperature_id' => 1,
                'foto_sampul' => '1.jpeg',
            ],
            [
                'id' => 'tt1746091',
                'Humidity' => '90',
                'Capacity' => '50',
                'tahun' => 2023,
                'Temperature_id' => 1,
                'foto_sampul' => '9.jpg',
            ],
        ];
        foreach ($Instansis as $Instansi) {
            Instansi::create($Instansi);
        }
    }
}
