<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('colour')->nullable(false);
            $table->string('bodytype')->nullable(false);
            $table->string('fleetnumber')->unique(false);
            $table->string('chasisnumber')->unique(false);
            $table->string('enginenumber')->unique(false);
            $table->string('yearofmanufacture')->nullable(false);
            $table->string('fueltype')->nullable(false);
            $table->integer('netmass')->nullable();
            $table->string('regnumber')->unique();
            $table->string('assignedTo')->nullable();
            $table->string('assingType');
            $table->string('assignedby')->nullable();
            $table->date('dateAssigned')->nullable();
            $table->boolean('isAssigned')->default(false);
            $table->boolean('branded')->default(false);
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
