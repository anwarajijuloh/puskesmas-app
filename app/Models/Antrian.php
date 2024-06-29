<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id', 'poli_id', 'dokter_id', 'prioritas', 'status'];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
