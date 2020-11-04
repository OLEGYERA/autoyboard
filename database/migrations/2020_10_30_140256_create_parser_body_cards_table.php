<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserBodyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_body_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('body_id')->unsigned()->nullable();
            $table->bigInteger('fuel_id')->unsigned()->nullable();
            $table->bigInteger('transmission_id')->unsigned()->nullable();
            $table->bigInteger('gear_id')->unsigned()->nullable();
            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->smallInteger('doors')->nullable();
            $table->smallInteger('seats')->nullable();
            $table->smallInteger('mileage')->nullable();
            $table->double('volume')->nullable();
            $table->double('horse')->nullable();
            $table->double('kilowatt')->nullable();
            $table->double('cons_city')->nullable();
            $table->double('cons_track')->nullable();
            $table->double('cons_mixed')->nullable();
            $table->boolean('metalic')->default(false);

            $table->timestamps();

            $table->foreign('id')->references('id')->on('parser_url_lists');
            $table->foreign('body_id')->references('id')->on('tranport_bodies');
            $table->foreign('fuel_id')->references('id')->on('transport_ch_fuels');
            $table->foreign('transmission_id')->references('id')->on('tranport_ch_transmissions');
            $table->foreign('gear_id')->references('id')->on('tranport_ch_gears');
            $table->foreign('color_id')->references('id')->on('transport_ch_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_body_cards', function (Blueprint $table) {
            $table->dropForeign('parser_body_cards_id_foreign');
            $table->dropForeign('parser_body_body_id_foreign');
            $table->dropForeign('parser_body_fuel_id_foreign');
            $table->dropForeign('parser_body_transmission_id_foreign');
            $table->dropForeign('parser_body_color_id_foreign');

        });
        Schema::dropIfExists('parser_body_cards');
    }
}
