<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class LaboratoryTest extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'test_date',
        'leukocyte_count',
        'neutrophils',
        'lymphocyte',
        'eosinophil',
        'basophil',
        'monocytes',
        'erythrocytes',
        'haemoglobin',
        'hematocrit',
        'sugar',
        'esr_low',
        'esr_heigh',
        'urea',
        'creatine',
        'alkaline_phosphatase',
        'phosphorus',
        'calcium',
        'triglyceride',
        'cholesterol',
        'uric_acid',
        'wright_test',
        'widal',
        'urine_color',
        'specific_gravity',
        'urine_ph',
        'urine_leukocyte',
        'urine_erythrocytes',
        'sediment',
        'oxaluria',
        'urine_haemoglobin',
        'germ',
        'allergy',
        'others',
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
        'test_date',
    ];


    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
}
