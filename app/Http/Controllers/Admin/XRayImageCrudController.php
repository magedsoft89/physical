<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\XRayImageRequest;
use App\Models\Patient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class XRayImageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class XRayImageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\XRayImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/xrayimage');
        CRUD::setEntityNameStrings('xrayimage', 'x_ray_images');
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
        CRUD::column('image_date');
        CRUD::column('kind');
        CRUD::column('place');
        CRUD::column('description');
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
        CRUD::setValidation(XRayImageRequest::class);

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
        CRUD::field('image_date');
        CRUD::field('kind');
        CRUD::field('place');
        CRUD::field('description');

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
