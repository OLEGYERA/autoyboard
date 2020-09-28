<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkrainianCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukrainian_cities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rtitle')->nullable();
            $table->string('utitle')->nullable();
            $table->string('alias');

            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('ukrainian_regions');
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
        Schema::table('ukrainian_cities', function (Blueprint $table) {
            $table->dropForeign('ukrainian_cities_region_id_foreign');
        });

        Schema::dropIfExists('ukrainian_cities');
    }
}
