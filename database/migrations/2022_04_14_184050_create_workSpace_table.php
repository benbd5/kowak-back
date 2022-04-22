<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkSpaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workSpace', function (Blueprint $table) {
            $table->id('workSpaceId');
            $table->string('name');
            $table->string('region');
            $table->string('zipCode', 5);
            $table->string('departement');
            $table->string('city');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->text('description');
            $table->decimal('surface', 10, 2);
            $table->integer('desk')->nullable();
            $table->integer('computerScreen')->nullable();
            $table->boolean('kitchen')->nullable();
            $table->boolean('handicappedPersonsAccess');
            $table->integer('projector')->nullable();
            $table->boolean('parking');
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
        Schema::dropIfExists('workSpace');
    }
}
