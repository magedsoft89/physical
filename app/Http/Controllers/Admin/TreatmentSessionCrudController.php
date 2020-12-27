<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TreatmentSessionRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TreatmentSessionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TreatmentSessionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\TreatmentSession::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/treatmentsession');
        CRUD::setEntityNameStrings('treatmentsession', 'treatment_sessions');
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
            'name' => 'physical_therapy_id', // the column that contains the ID of that connected entity;
            'entity' => 'physicalTherapy', // the method that defines the relationship in your Model
            'attribute' => "patient_name", // foreign key attribute that is shown to user
            'model' => 'App\Models\PhysicalTherapy' // foreign key model
        ]);
        CRUD::column('session_date');
        CRUD::column('applied_plan');
        CRUD::column('code');
        CRUD::column('notes');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        // Show only TreatmentSessions for current patient
        $patientId = session('patient_id', null);
        if ($patientId != null){
            $patient = Patient::find($patientId);
            $this->crud->addClause('where', 'physical_therapy_id', '=', $patient->physicalTherapy->id);
        }

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
        CRUD::setValidation(TreatmentSessionRequest::class);

        $patientId = session('patient_id', null);

        if ($patientId != null){
            $patient = Patient::find($patientId);
            $physicalTherapy = $patient->physicalTherapy;

            $this->crud->addField([
                'type' => 'text',
                'name' => 'patient_full_name',
                'value' => $physicalTherapy->patient_name,
                'attributes' => ['readonly' => 'readonly','disabled' => 'disabled'],
            ]);
            $this->crud->addField([
                'type' => 'hidden',
                'name' => 'physical_therapy_id',
                'value' => $physicalTherapy->id,
            ]);
        }else{
            $this->crud->addField([
                'label' => "Patient", // Table column heading
                'type' => "select",
                'name' => 'physical_therapy_id', // the column that contains the ID of that connected entity;
                'entity' => 'physicalTherapy', // the method that defines the relationship in your Model
                'attribute' => "patient_name", // foreign key attribute that is shown to user
                'model' => 'App\Models\PhysicalTherapy' // foreign key model
            ]);
        }

        CRUD::field('session_date');
        CRUD::field('applied_plan');
        CRUD::field('code');
        CRUD::field('notes');

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
