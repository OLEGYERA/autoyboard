<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParserMainCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_main_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('model_id')->unsigned()->nullable();
            $table->string('modification')->nullable()->nullable();
            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('manufacture_id')->unsigned()->nullable();
            $table->smallInteger('year')->nullable();
            $table->string('chat_link')->nullable();
            $table->integer('price_value')->nullable();
            $table->integer('price_currency')->nullable();
            $table->timestamp('resource_created')->nullable();
            $table->timestamp('resource_updated')->nullable();
            $table->longText('description')->nullable();

            $table->boolean('abroad')->default(false);
            $table->boolean('credit')->default(false);
            $table->boolean('accident')->default(false);
            $table->boolean('noMotion')->default(false);
            $table->boolean('exchange')->default(false);
            $table->boolean('bargain')->default(false);
            $table->boolean('customsСleared')->default(false);


            $table->foreign('id')->references('id')->on('parser_url_lists');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('region_id')->references('id')->on('ukrainian_regions');
            $table->foreign('city_id')->references('id')->on('ukrainian_cities');
            $table->foreign('manufacture_id')->references('id')->on('manufacture_countries');

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
        Schema::table('parser_main_cards', function (Blueprint $table) {
            $table->dropForeign('parser_main_cards_id_foreign');
            $table->dropForeign('parser_main_cards_brand_id_foreign');
            $table->dropForeign('parser_main_cards_model_id_foreign');
            $table->dropForeign('parser_main_cards_region_id_foreign');
            $table->dropForeign('parser_main_cards_city_id_foreign');
            $table->dropForeign('parser_main_cards_manufacture_id_foreign');
        });
        Schema::dropIfExists('parser_main_cards');
    }
}
