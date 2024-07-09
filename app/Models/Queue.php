<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'polyclinic_id', 'doctor_id', 'priority', 'queued_at'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}
