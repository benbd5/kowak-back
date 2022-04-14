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
            $table->integer('workSpaceId', true);
            $table->string('name');
            $table->string('region');
            $table->string('zipCode', 5);
            $table->string('departement');
            $table->string('city');
            $table->decimal('latitude', 10, 0);
            $table->decimal('longitude', 10, 0);
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
