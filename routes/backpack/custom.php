<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('clinicalsigns', 'ClinicalSignsCrudController');
    Route::crud('laboratorytest', 'LaboratoryTestCrudController');
    Route::crud('nervoussystemtest', 'NervousSystemTestCrudController');
    Route::crud('patient', 'PatientCrudController');
    Route::crud('physicaltherapy', 'PhysicalTherapyCrudController');
    Route::crud('prescription', 'PrescriptionCrudController');
    Route::crud('problem', 'ProblemCrudController');
    Route::crud('treatmentsession', 'TreatmentSessionCrudController');
    Route::crud('visit', 'VisitCrudController');
    Route::crud('xrayimage', 'XRayImageCrudController');
}); // this should be the absolute last line of this file