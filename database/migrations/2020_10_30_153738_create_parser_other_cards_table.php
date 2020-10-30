<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserOtherCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_other_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->bigInteger('other_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('url_id')->references('id')->on('parser_url_lists');
            $table->foreign('other_id')->references('id')->on('transport_ch_teches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_other_cards', function (Blueprint $table) {
            $table->dropForeign('parser_other_cards_url_id_foreign');
            $table->dropForeign('parser_other_cards_other_id_foreign');
        });
        Schema::dropIfExists('parser_other_cards');
    }
}
