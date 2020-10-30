<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserMultimediaCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_multimedia_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->bigInteger('multimedia_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('url_id')->references('id')->on('parser_url_lists');
            $table->foreign('multimedia_id')->references('id')->on('transport_ch_teches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_multimedia_cards', function (Blueprint $table) {
            $table->dropForeign('parser_multimedia_cards_url_id_foreign');
            $table->dropForeign('parser_multimedia_cards_multimedia_id_foreign');
        });
        Schema::dropIfExists('parser_multimedia_cards');
    }
}
