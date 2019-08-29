<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoroughIdToParks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parks', function (Blueprint $table) {
          $table->bigInteger("borough_id")->unsigned()->nullable();
          $table->foreign("borough_id")->references("id")->on("boroughs")->onDelete("cascade");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parks', function (Blueprint $table) {
            $table->dropColumn('borough_id');
        });
    }
}
