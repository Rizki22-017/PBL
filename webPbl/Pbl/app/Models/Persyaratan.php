<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'Temperature_id', 'tgl', 'nip', 'hp', 'perusahaan', 'Capacity', 'tahun',  'foto_sampul'];

    public function persyaratan()
    {
        return $this->belongsTo(Persyaratan::class);
    }
}
