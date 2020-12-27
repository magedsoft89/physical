<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Problem extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'main_complaint',
        'story',
        'first_visit_date',
        'previous_treatments',
        'response_to_treatment',
        'medical_history',
        'surgical_history',
        'familial_diseases',
        'associated_diseases',
        'current_treatments',
        'pain_kind',
        'pain_place',
        'pain_severity',
        'pain_continuity',
        'pain_evolution',
        'pain_time',
        'associated_complaints',
        'pain_spread',
        'resulting_disability',
        'aggravating_factors',
        'mitigating_factors',
        'muscle_weakness_kind',
        'muscle_weakness_spread',
        'sense_changing_kind',
        'sense_changing_spread',
        'intestinal_function',
        'bladder_function',
        'clinical_impression',
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
        'first_visit_date',
    ];


    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
