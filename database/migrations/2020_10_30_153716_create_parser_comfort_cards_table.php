<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserComfortCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_comfort_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->bigInteger('comfort_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('url_id')->references('id')->on('parser_url_lists');
            $table->foreign('comfort_id')->references('id')->on('transport_ch_teches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_comfort_cards', function (Blueprint $table) {
            $table->dropForeign('parser_comfort_cards_url_id_foreign');
            $table->dropForeign('parser_comfort_cards_comfort_id_foreign');
        });
        Schema::dropIfExists('parser_comfort_cards');
    }
}
