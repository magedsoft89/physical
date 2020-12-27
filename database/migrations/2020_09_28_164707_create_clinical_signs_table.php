<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('clinical_signs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('pressure_heigher')->nullable();
            $table->unsignedSmallInteger('pressure_lower')->nullable();
            $table->unsignedSmallInteger('pulse')->nullable();
            $table->unsignedSmallInteger('breathing')->nullable();
            $table->unsignedSmallInteger('temperature')->nullable();
            $table->string('head')->nullable();
            $table->string('neck')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('heart')->nullable();
            $table->string('urinary_system')->nullable();
            $table->string('lymphatic_system')->nullable();
            $table->text('muscular_strength')->nullable();
            $table->text('muscle_tonic')->nullable();
            $table->string('joint_fixity')->nullable();
            $table->text('motion_range')->nullable();
            $table->text('clinical_test')->nullable();
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
        Schema::dropIfExists('clinical_signs');
    }
}
