<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('proxies', function (Blueprint $table) {
//            $table->id();
//            $table->tinyInteger('status')->default(0);
//            $table->string('country');
//            $table->string('city');
//            $table->string('ip');
//            $table->boolean('ban');
//            $table->timestamp('timeLife');
//            $table->string('login');
//            $table->string('password');
//            $table->string('connect_type');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('proxies');
    }
}
