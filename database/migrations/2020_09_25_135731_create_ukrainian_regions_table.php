<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkrainianRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukrainian_regions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rtitle')->nullable();
            $table->string('utitle')->nullable();
            $table->string('alias');


            $table->bigInteger('region_part_id')->unsigned();
            $table->foreign('region_part_id')->references('id')->on('ukrainian_region_parts');
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
        Schema::table('ukrainian_regions', function (Blueprint $table) {
            $table->dropForeign('ukrainian_regions_region_part_id_foreign');
        });

        Schema::dropIfExists('ukrainian_regions');
    }
}
