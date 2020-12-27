<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'nick_name',
        'patient_code',
        'gender',
        'kids_count',
        'little_kid_old',
        'DOB',
        'weight',
        'height',
        'address',
        'phone',
        'job',
        'personal_habits',
        'referring_doctor',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kids_count' => 'integer',
        'little_kid_old' => 'integer',
        'weight' => 'integer',
        'height' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'DOB',
    ];


    public function problem()
    {
        return $this->hasOne(\App\Models\Problem::class);
    }

    public function physicalTherapy()
    {
        return $this->hasOne(\App\Models\PhysicalTherapy::class);
    }

    public function visits()
    {
        return $this->hasMany(\App\Models\Visit::class);
    }

    public function xRayImages()
    {
        return $this->hasMany(\App\Models\XRayImage::class);
    }

    public function laboratoryTests()
    {
        return $this->hasMany(\App\Models\LaboratoryTest::class);
    }

    public function nervousSystemTests()
    {
        return $this->hasMany(\App\Models\NervousSystemTest::class);
    }

    public function getFullNameAttribute($value) {
        return $this->first_name.' '.$this->last_name.' - '.$this->patient_code;
    }
}
