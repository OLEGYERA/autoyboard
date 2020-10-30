<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserStateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_state_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('url_id')->references('id')->on('parser_url_lists');
            $table->foreign('state_id')->references('id')->on('transport_ch_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_state_cards', function (Blueprint $table) {
            $table->dropForeign('parser_state_cards_url_id_foreign');
            $table->dropForeign('parser_state_cards_state_id_foreign');
        });
        Schema::dropIfExists('parser_state_cards');
    }
}
