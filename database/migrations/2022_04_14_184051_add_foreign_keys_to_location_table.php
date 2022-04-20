<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('location', function (Blueprint $table) {
            $table->foreign(['userId'], 'location_users0_FK')->references(['userId'])->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['workSpaceId'], 'location_workSpace_FK')->references(['workSpaceId'])->on('workSpace')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('location', function (Blueprint $table) {
            $table->dropForeign('location_users0_FK');
            $table->dropForeign('location_workSpace_FK');
        });
    }
}
