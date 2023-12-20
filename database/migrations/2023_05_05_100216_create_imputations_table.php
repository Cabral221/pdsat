<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImputationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imputations', function (Blueprint $table) {
            $table->id();

            $table->float('load_employe')->default(0.2);
            $table->float('load_employer')->default(0.8);

            $table->string('sick_name')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->bigInteger('phone');

            $table->string('registration_number');
            $table->unsignedBigInteger('service_id')->index();
            $table->string('fonction');

            $table->string('file')->nullable();

            $table->boolean('validation')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imputations');
    }
}
