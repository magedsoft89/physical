<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PrescriptionRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PrescriptionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PrescriptionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Prescription::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/prescription');
        CRUD::setEntityNameStrings('prescription', 'prescriptions');
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
        CRUD::column('drugs');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        // Show only Prescriptions for the current patient
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
        CRUD::setValidation(PrescriptionRequest::class);

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

        CRUD::field('drugs');

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
