<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['photo', 'user_id', 'polyclinic_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}
