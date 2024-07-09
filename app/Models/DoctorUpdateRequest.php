<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorUpdateRequest extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'name', 'email', 'polyclinic_id'];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}
