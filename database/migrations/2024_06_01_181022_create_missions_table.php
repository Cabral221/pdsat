<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->boolean('genre');
            $table->string('name');
            $table->string('fonction');
            $table->string('matricule');
            $table->boolean('matrimonial')->default(true);
            $table->unsignedBigInteger('depart_id')->index();
            $table->unsignedBigInteger('arrive_id')->index();
            $table->unsignedBigInteger('mission_id')->index();
            $table->date('date_depart');
            $table->date('date_arrive');
            $table->string('vehicule');
            $table->boolean('carburant')->default(false);
            $table->integer('nombre_personne');
            $table->boolean('validation')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();

            // Foreign key
            $table->foreign('depart_id')->references('id')->on('regions');
            $table->foreign('arrive_id')->references('id')->on('regions');
            // $table->foreign('mission_id')->references('id')->on('type_missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
