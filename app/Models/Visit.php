<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'visit_number',
        'visit_date',
        'notes',
        'code',
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
        'visit_date',
    ];


    public function prescription()
    {
        return $this->hasOne(\App\Models\Prescription::class);
    }

    public function clinicalSigns()
    {
        return $this->hasOne(\App\Models\ClinicalSigns::class);
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function getDetailsAttribute($value) {
        return $this->patient->full_name.' - Visit#: '.$this->visit_number;
    }
}
