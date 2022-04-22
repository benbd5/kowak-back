<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartenirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartenir', function (Blueprint $table) {
            $table->unsignedBigInteger('workSpaceId');
            $table->unsignedBigInteger('userId')->index('appartenir_users0_FK');

            $table->primary(['workSpaceId', 'userId']);
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
        Schema::dropIfExists('appartenir');
    }
}
