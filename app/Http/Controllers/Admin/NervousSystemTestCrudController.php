<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NervousSystemTestRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NervousSystemTestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NervousSystemTestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\NervousSystemTest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/nervoussystemtest');
        CRUD::setEntityNameStrings('nervoussystemtest', 'nervous_system_tests');
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
        CRUD::column('test_date');
        CRUD::column('muscles_reflections');
        CRUD::column('surface_reflections');
        CRUD::column('light_touch');
        CRUD::column('pain');
        CRUD::column('heat');
        CRUD::column('two_points');
        CRUD::column('sensory_discrimination');
        CRUD::column('vibration');
        CRUD::column('postures');
        CRUD::column('glasgow');
        CRUD::column('orientation');
        CRUD::column('attention');
        CRUD::column('memory');
        CRUD::column('calculation');
        CRUD::column('judgment');
        CRUD::column('food');
        CRUD::column('clothes');
        CRUD::column('bathroom');
        CRUD::column('toilet');
        CRUD::column('moving');
        CRUD::column('listening');
        CRUD::column('reading');
        CRUD::column('speaking');
        CRUD::column('writing');
        CRUD::column('walking_pattern');
        CRUD::column('meningitics_signs');
        CRUD::column('cerebellous_signs');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        // Show only xray images for current patient
        $patientId = session('patient_id', null);
        if ($patientId != null){
            $this->crud->addClause('where', 'patient_id', '=', $patientId);
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
        CRUD::setValidation(NervousSystemTestRequest::class);

        $patientId = session('patient_id', null);

        if ($patientId != null){
            $patient = Patient::find($patientId);

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
        CRUD::field('test_date');
        CRUD::field('muscles_reflections');
        CRUD::field('surface_reflections');
        CRUD::field('light_touch');
        CRUD::field('pain');
        CRUD::field('heat');
        CRUD::field('two_points');
        CRUD::field('sensory_discrimination');
        CRUD::field('vibration');
        CRUD::field('postures');
        CRUD::field('glasgow');
        CRUD::field('orientation');
        CRUD::field('attention');
        CRUD::field('memory');
        CRUD::field('calculation');
        CRUD::field('judgment');
        CRUD::field('food');
        CRUD::field('clothes');
        CRUD::field('bathroom');
        CRUD::field('toilet');
        CRUD::field('moving');
        CRUD::field('listening');
        CRUD::field('reading');
        CRUD::field('speaking');
        CRUD::field('writing');
        CRUD::field('walking_pattern');
        CRUD::field('meningitics_signs');
        CRUD::field('cerebellous_signs');

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
