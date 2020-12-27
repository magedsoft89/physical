<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->string('main_complaint');
            $table->text('story')->nullable();
            $table->date('first_visit_date')->nullable();
            $table->string('previous_treatments')->nullable();
            $table->string('response_to_treatment')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('surgical_history')->nullable();
            $table->text('familial_diseases')->nullable();
            $table->string('associated_diseases')->nullable();
            $table->text('current_treatments')->nullable();
            $table->string('pain_kind')->nullable();
            $table->string('pain_place')->nullable();
            $table->string('pain_severity')->nullable();
            $table->string('pain_continuity')->nullable();
            $table->string('pain_evolution')->nullable();
            $table->string('pain_time')->nullable();
            $table->text('associated_complaints')->nullable();
            $table->string('pain_spread')->nullable();
            $table->string('resulting_disability')->nullable();
            $table->string('aggravating_factors')->nullable();
            $table->string('mitigating_factors')->nullable();
            $table->string('muscle_weakness_kind')->nullable();
            $table->string('muscle_weakness_spread')->nullable();
            $table->string('sense_changing_kind')->nullable();
            $table->string('sense_changing_spread')->nullable();
            $table->string('intestinal_function')->nullable();
            $table->string('bladder_function')->nullable();
            $table->string('clinical_impression')->nullable();
            $table->text('notes')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('problems');
    }
}
