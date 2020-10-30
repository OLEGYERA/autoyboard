<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserPhotoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_photo_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->string('path');
            $table->timestamps();

            $table->foreign('url_id')->references('id')->on('parser_url_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parser_photo_cards', function (Blueprint $table) {
            $table->dropForeign('parser_photo_cards_url_id_foreign');
        });
        Schema::dropIfExists('parser_photo_cards');
    }
}
