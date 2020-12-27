<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClinicalSignsRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClinicalSignsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClinicalSignsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ClinicalSigns::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/clinicalsigns');
        CRUD::setEntityNameStrings('clinicalsigns', 'clinical_signs');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'label' => "Patient", // Table column heading
            'type' => "select",
            'name' => 'visit_id', // the column that contains the ID of that connected entity;
            'entity' => 'visit', // the method that defines the relationship in your Model
            'attribute' => "details", // foreign key attribute that is shown to user
            'model' => 'App\Models\Visit' // foreign key model
        ]);
        CRUD::column('visit_id');
        CRUD::column('pressure_heigher');
        CRUD::column('pressure_lower');
        CRUD::column('pulse');
        CRUD::column('breathing');
        CRUD::column('temperature');
        CRUD::column('head');
        CRUD::column('neck');
        CRUD::column('abdomen');
        CRUD::column('heart');
        CRUD::column('urinary_system');
        CRUD::column('lymphatic_system');
        CRUD::column('muscular_strength');
        CRUD::column('muscle_tonic');
        CRUD::column('joint_fixity');
        CRUD::column('motion_range');
        CRUD::column('clinical_test');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        // Show only ClinicalSigns for the current patient
        $patientId = session('patient_id', null);
        if ($patientId != null){
            $patient = Patient::find($patientId);
            $this->crud->addClause('whereIn', 'visit_id',  $patient->visits->pluck('id'));
        }

        $this->crud->removeButton('create');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClinicalSignsRequest::class);

        //CRUD::field('visit_id')->attribute('details');
        $patientId = session('patient_id', null);

        if ($patientId != null){
            $patient = Patient::find($patientId);
            $lastVisit = $patient->visits()->latest()->first();

            $this->crud->addField([
                'type' => 'text',
                'name' => 'patient_full_name',
                'value' => $lastVisit->details,
                'attributes' => ['readonly' => 'readonly','disabled' => 'disabled'],
            ]);
            $this->crud->addField([
                'type' => 'hidden',
                'name' => 'visit_id',
                'value' => $lastVisit->id,
            ]);
        }else{
            CRUD::field('visit_id')->attribute('details');
        }

        CRUD::field('pressure_heigher');
        CRUD::field('pressure_lower');
        CRUD::field('pulse');
        CRUD::field('breathing');
        CRUD::field('temperature');
        CRUD::field('head');
        CRUD::field('neck');
        CRUD::field('abdomen');
        CRUD::field('heart');
        CRUD::field('urinary_system');
        CRUD::field('lymphatic_system');
        CRUD::field('muscular_strength');
        CRUD::field('muscle_tonic');
        CRUD::field('joint_fixity');
        CRUD::field('motion_range');
        CRUD::field('clinical_test');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
