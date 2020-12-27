<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalSigns extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visit_id',
        'pressure_heigher',
        'pressure_lower',
        'pulse',
        'breathing',
        'temperature',
        'head',
        'neck',
        'abdomen',
        'heart',
        'urinary_system',
        'lymphatic_system',
        'muscular_strength',
        'muscle_tonic',
        'joint_fixity',
        'motion_range',
        'clinical_test',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'visit_id' => 'integer',
        'pressure_heigher' => 'integer',
        'pressure_lower' => 'integer',
        'pulse' => 'integer',
        'breathing' => 'integer',
        'temperature' => 'integer',
    ];


    public function visit()
    {
        return $this->belongsTo(\App\Models\Visit::class);
    }

    // Not Needed now
//    public function patient()
//    {
//        return $this->hasOneThrough('App\Models\Patient', 'App\Models\Visit');
//    }
}
