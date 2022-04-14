<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->integer('featuresId', true);
            $table->integer('desk')->nullable();
            $table->integer('computerScreen')->nullable();
            $table->boolean('kitchen')->nullable();
            $table->boolean('handicappedPersonsAccess');
            $table->integer('workSpaceId')->index('features_workSpace_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
