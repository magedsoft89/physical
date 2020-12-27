<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNervousSystemTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('nervous_system_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->date('test_date');
            $table->text('muscles_reflections')->nullable();
            $table->text('surface_reflections')->nullable();
            $table->string('light_touch')->nullable();
            $table->string('pain')->nullable();
            $table->string('heat')->nullable();
            $table->string('two_points')->nullable();
            $table->string('sensory_discrimination')->nullable();
            $table->string('vibration')->nullable();
            $table->string('postures')->nullable();
            $table->string('glasgow')->nullable();
            $table->string('orientation')->nullable();
            $table->string('attention')->nullable();
            $table->string('memory')->nullable();
            $table->string('calculation')->nullable();
            $table->string('judgment')->nullable();
            $table->string('food')->nullable();
            $table->string('clothes')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('toilet')->nullable();
            $table->string('moving')->nullable();
            $table->string('listening')->nullable();
            $table->string('reading')->nullable();
            $table->string('speaking')->nullable();
            $table->string('writing')->nullable();
            $table->string('walking_pattern')->nullable();
            $table->string('meningitics_signs')->nullable();
            $table->string('cerebellous_signs')->nullable();
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
        Schema::dropIfExists('nervous_system_tests');
    }
}
