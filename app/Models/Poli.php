<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'dokter_id'];
    public function antrian()
    {
        return $this->hasMany(Antrian::class);
    }
    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }
}
