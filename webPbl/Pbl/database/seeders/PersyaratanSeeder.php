<?php

namespace Database\Seeders;

use App\Models\Persyaratan;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persyaratans = [
            [
                'nama' => 'Annisa',
                'Temperature_id' => 2,
                'tgl' => '2023-12-29',
                'nip' => 108,
                'hp' => '08638008',
                'perusahaan' => 'pt kembang',
                'Capacity' => 'solok',
                'tahun' => 2023,
                'foto_sampul' => '9.jpg',
            ],
            [
                'nama' => 'Annisa',
                'Temperature_id' => 2,
                'tgl' => '2023-12-29',
                'nip' => 108,
                'hp' => '08638008',
                'perusahaan' => 'pt kembang',
                'Capacity' => 'solok',
                'tahun' => 2023,
                'foto_sampul' => '9.jpg',
            ],
        ];

        foreach ($persyaratans as $persyaratan) {
            Persyaratan::create($persyaratan); 
        }
    }
}
