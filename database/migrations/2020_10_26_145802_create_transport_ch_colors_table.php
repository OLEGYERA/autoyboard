<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportChColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_ch_colors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rtitle')->nullable();
            $table->string('utitle')->nullable();
            $table->string('alias');
            $table->string('color')->nullable();
            $table->string('bg_color')->nullable();

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
        Schema::dropIfExists('transport_ch_colors');
    }
}
