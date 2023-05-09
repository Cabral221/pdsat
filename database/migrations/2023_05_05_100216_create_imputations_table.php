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
            $table->string('sick_name');
            $table->string('agent');
            $table->string('registration_number');
            $table->string('service');
            $table->boolean('status')->default(false);
            $table->boolean('validation')->default(false);
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
        Schema::dropIfExists('imputations');
    }
}
