<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoryTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('laboratory_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->date('test_date');
            $table->string('leukocyte_count')->nullable();
            $table->string('neutrophils')->nullable();
            $table->string('lymphocyte')->nullable();
            $table->string('eosinophil')->nullable();
            $table->string('basophil')->nullable();
            $table->string('monocytes')->nullable();
            $table->string('erythrocytes')->nullable();
            $table->string('haemoglobin')->nullable();
            $table->string('hematocrit')->nullable();
            $table->string('sugar')->nullable();
            $table->string('esr_low')->nullable();
            $table->string('esr_heigh')->nullable();
            $table->string('urea')->nullable();
            $table->string('creatine')->nullable();
            $table->string('alkaline_phosphatase')->nullable();
            $table->string('phosphorus')->nullable();
            $table->string('calcium')->nullable();
            $table->string('triglyceride')->nullable();
            $table->string('cholesterol')->nullable();
            $table->string('uric_acid')->nullable();
            $table->string('wright_test')->nullable();
            $table->string('widal')->nullable();
            $table->string('urine_color')->nullable();
            $table->string('specific_gravity')->nullable();
            $table->string('urine_ph')->nullable();
            $table->string('urine_leukocyte')->nullable();
            $table->string('urine_erythrocytes')->nullable();
            $table->string('sediment')->nullable();
            $table->string('oxaluria')->nullable();
            $table->string('urine_haemoglobin')->nullable();
            $table->string('germ')->nullable();
            $table->string('allergy')->nullable();
            $table->text('others')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratory_tests');
    }
}
