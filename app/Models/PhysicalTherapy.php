<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalTherapy extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'diagnosis',
        'treatment_plan',
        'treatment_start_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'treatment_start_date',
    ];


    public function treatmentSessions()
    {
        return $this->hasMany(\App\Models\TreatmentSession::class,'physical_therapy_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function getPatientNameAttribute($value)
    {
        return $this->patient->full_name;
    }
}
