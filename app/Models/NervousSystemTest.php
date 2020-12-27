<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class NervousSystemTest extends Model
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
        'muscles_reflections',
        'surface_reflections',
        'light_touch',
        'pain',
        'heat',
        'two_points',
        'sensory_discrimination',
        'vibration',
        'postures',
        'glasgow',
        'orientation',
        'attention',
        'memory',
        'calculation',
        'judgment',
        'food',
        'clothes',
        'bathroom',
        'toilet',
        'moving',
        'listening',
        'reading',
        'speaking',
        'writing',
        'walking_pattern',
        'meningitics_signs',
        'cerebellous_signs',
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
