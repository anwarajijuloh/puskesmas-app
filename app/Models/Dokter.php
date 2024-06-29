<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'poli_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function riwayat_kesehatan()
    {
        return $this->hasMany(RiwayatKesehatan::class);
    }
}
