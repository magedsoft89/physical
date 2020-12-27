<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LaboratoryTestRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LaboratoryTestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LaboratoryTestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\LaboratoryTest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/laboratorytest');
        CRUD::setEntityNameStrings('laboratorytest', 'laboratory_tests');
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
        CRUD::column('leukocyte_count');
        CRUD::column('neutrophils');
        CRUD::column('lymphocyte');
        CRUD::column('eosinophil');
        CRUD::column('basophil');
        CRUD::column('monocytes');
        CRUD::column('erythrocytes');
        CRUD::column('haemoglobin');
        CRUD::column('hematocrit');
        CRUD::column('sugar');
        CRUD::column('esr_low');
        CRUD::column('esr_heigh');
        CRUD::column('urea');
        CRUD::column('creatine');
        CRUD::column('alkaline_phosphatase');
        CRUD::column('phosphorus');
        CRUD::column('calcium');
        CRUD::column('triglyceride');
        CRUD::column('cholesterol');
        CRUD::column('uric_acid');
        CRUD::column('wright_test');
        CRUD::column('widal');
        CRUD::column('urine_color');
        CRUD::column('specific_gravity');
        CRUD::column('urine_ph');
        CRUD::column('urine_leukocyte');
        CRUD::column('urine_erythrocytes');
        CRUD::column('sediment');
        CRUD::column('oxaluria');
        CRUD::column('urine_haemoglobin');
        CRUD::column('germ');
        CRUD::column('allergy');
        CRUD::column('others');
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
        CRUD::setValidation(LaboratoryTestRequest::class);

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
        CRUD::field('leukocyte_count');
        CRUD::field('neutrophils');
        CRUD::field('lymphocyte');
        CRUD::field('eosinophil');
        CRUD::field('basophil');
        CRUD::field('monocytes');
        CRUD::field('erythrocytes');
        CRUD::field('haemoglobin');
        CRUD::field('hematocrit');
        CRUD::field('sugar');
        CRUD::field('esr_low');
        CRUD::field('esr_heigh');
        CRUD::field('urea');
        CRUD::field('creatine');
        CRUD::field('alkaline_phosphatase');
        CRUD::field('phosphorus');
        CRUD::field('calcium');
        CRUD::field('triglyceride');
        CRUD::field('cholesterol');
        CRUD::field('uric_acid');
        CRUD::field('wright_test');
        CRUD::field('widal');
        CRUD::field('urine_color');
        CRUD::field('specific_gravity');
        CRUD::field('urine_ph');
        CRUD::field('urine_leukocyte');
        CRUD::field('urine_erythrocytes');
        CRUD::field('sediment');
        CRUD::field('oxaluria');
        CRUD::field('urine_haemoglobin');
        CRUD::field('germ');
        CRUD::field('allergy');
        CRUD::field('others');

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
