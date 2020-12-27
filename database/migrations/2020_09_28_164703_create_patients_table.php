<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nick_name')->nullable();
            $table->string('patient_code');
            $table->enum('gender', ["male","female"]);
            $table->unsignedSmallInteger('kids_count')->nullable();
            $table->unsignedSmallInteger('little_kid_old')->nullable();
            $table->date('DOB')->nullable();
            $table->smallInteger('weight')->nullable();
            $table->smallInteger('height')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('job')->nullable();
            $table->string('personal_habits')->nullable();
            $table->string('referring_doctor')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
