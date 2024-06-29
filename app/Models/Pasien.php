<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tgl_lahir', 'alamat', 'photo'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function antrian()
    {
        return $this->hasMany(Antrian::class);
    }
    public function riwayat_kesehatan()
    {
        return $this->hasMany(RiwayatKesehatan::class);
    }
    public function age()
    {
        return Carbon::parse($this->tgl_lahir)->age;
    }
}
