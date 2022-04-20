<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppartenirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appartenir', function (Blueprint $table) {
            $table->foreign(['userId'], 'appartenir_users0_FK')
                ->references(['userId'])
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign(['workSpaceId'], 'appartenir_workSpace_FK')
                ->references(['workSpaceId'])
                ->on('workSpace')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appartenir', function (Blueprint $table) {
            $table->dropForeign('appartenir_users0_FK');
            $table->dropForeign('appartenir_workSpace_FK');
        });
    }
}
