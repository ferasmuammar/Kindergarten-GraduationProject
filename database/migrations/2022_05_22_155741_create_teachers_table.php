<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('First_name');
            $table->string('Second_name');
            $table->string('Last_name');
            $table->string('Mobile');
            $table->date('DateOfBirth');

           

            $table->text('Address');
            $table->integer('Age');


            $table->foreignId('Gender_id');
            $table->foreign('Gender_id')->on('genders')->references('id');

            $table->foreignId('Specialization_id');
            $table->foreign('Specialization_id')->on('specializations')->references('id');

            $table->foreignId('Nationalitie_id');
            $table->foreign('Nationalitie_id')->on('nationalities')->references('id');



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
        Schema::dropIfExists('teachers');
    }
}
