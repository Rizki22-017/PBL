<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'Humidity', 'Capacity', 'Temperature_id', 'tahun', 'foto_sampul'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function temperature()
    {
        return $this->belongsTo(temperature::class);
    }
}
