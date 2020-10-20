<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranportBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranport_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rtitle')->nullable();
            $table->string('utitle')->nullable();
            $table->string('alias');

            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('transport_types');

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
        Schema::table('tranport_bodies', function (Blueprint $table) {
            $table->dropForeign('tranport_bodies_type_id_foreign');
        });

        Schema::dropIfExists('tranport_bodies');
    }
}
