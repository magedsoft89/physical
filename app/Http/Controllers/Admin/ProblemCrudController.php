<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProblemRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProblemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProblemCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Problem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/problem');
        CRUD::setEntityNameStrings('problem', 'problems');
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
            'name' => 'patient_id', // the column that contains the ID of that connected entity;
            'entity' => 'patient', // the method that defines the relationship in your Model
            'attribute' => "full_name", // foreign key attribute that is shown to user
            'model' => 'App\Models\Patient' // foreign key model
        ]);
        CRUD::column('main_complaint');
        CRUD::column('story');
        CRUD::column('first_visit_date');
        CRUD::column('previous_treatments');
        CRUD::column('response_to_treatment');
        CRUD::column('medical_history');
        CRUD::column('surgical_history');
        CRUD::column('familial_diseases');
        CRUD::column('associated_diseases');
        CRUD::column('current_treatments');
        CRUD::column('pain_kind');
        CRUD::column('pain_place');
        CRUD::column('pain_severity');
        CRUD::column('pain_continuity');
        CRUD::column('pain_evolution');
        CRUD::column('pain_time');
        CRUD::column('associated_complaints');
        CRUD::column('pain_spread');
        CRUD::column('resulting_disability');
        CRUD::column('aggravating_factors');
        CRUD::column('mitigating_factors');
        CRUD::column('muscle_weakness_kind');
        CRUD::column('muscle_weakness_spread');
        CRUD::column('sense_changing_kind');
        CRUD::column('sense_changing_spread');
        CRUD::column('intestinal_function');
        CRUD::column('bladder_function');
        CRUD::column('clinical_impression');
        CRUD::column('notes');
        CRUD::column('code');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        $patientId = session('patient_id', null);
        if ($patientId != null){
            $this->crud->addClause('where', 'patient_id', '=', $patientId);
        }

        //remove create button
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
        CRUD::setValidation(ProblemRequest::class);

        $patientId = session('patient_id', null);
        $patient = Patient::find($patientId);

        if ($patientId != null){
            $this->crud->addField([
                'type' => 'text',
                'name' => 'patient_full_name',
                'value' => $patient->full_name,
                'attributes' => ['readonly' => 'readonly','disabled' => 'disabled'],
            ]);
            $this->crud->addField([
                'type' => 'hidden',
                'name' => 'patient_id',
                'value' => $patientId,
            ]);
        }else{
            $this->crud->addField([
                'label' => "Patient", // Table column heading
                'type' => "select",
                'name' => 'patient_id', // the column that contains the ID of that connected entity;
                'entity' => 'patient', // the method that defines the relationship in your Model
                'attribute' => "full_name", // foreign key attribute that is shown to user
                'model' => 'App\Models\Patient' // foreign key model
            ]);
        }
        CRUD::field('main_complaint');
        CRUD::field('story');
        CRUD::field('first_visit_date');
        CRUD::field('previous_treatments');
        CRUD::field('response_to_treatment');
        CRUD::field('medical_history');
        CRUD::field('surgical_history');
        CRUD::field('familial_diseases');
        CRUD::field('associated_diseases');
        CRUD::field('current_treatments');
        CRUD::field('pain_kind');
        CRUD::field('pain_place');
        CRUD::field('pain_severity');
        CRUD::field('pain_continuity');
        CRUD::field('pain_evolution');
        CRUD::field('pain_time');
        CRUD::field('associated_complaints');
        CRUD::field('pain_spread');
        CRUD::field('resulting_disability');
        CRUD::field('aggravating_factors');
        CRUD::field('mitigating_factors');
        CRUD::field('muscle_weakness_kind');
        CRUD::field('muscle_weakness_spread');
        CRUD::field('sense_changing_kind');
        CRUD::field('sense_changing_spread');
        CRUD::field('intestinal_function');
        CRUD::field('bladder_function');
        CRUD::field('clinical_impression');
        CRUD::field('notes');
        CRUD::field('code');

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
