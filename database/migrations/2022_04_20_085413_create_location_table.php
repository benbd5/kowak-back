<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id('locationId');
            $table->unsignedBigInteger('workSpaceId');
            $table->unsignedBigInteger('userId');
            $table->dateTime('startDate');
            $table->dateTime('endDate');

            $table->foreign(['userId'], 'location_users0_FK')
                ->references(['userId'])
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');

            $table->foreign(['workSpaceId'], 'location_workSpace_FK')
                ->references(['workSpaceId'])
                ->on('workSpace')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
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
        Schema::dropIfExists('location');
    }
};
