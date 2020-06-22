<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rtitle')->nullable();
            $table->string('utitle')->nullable();
            $table->string('alias')->unique();
            $table->string('logo')->nullable();
            $table->boolean('car')->nullable();
            $table->boolean('moto')->nullable();
            $table->boolean('tractor')->nullable();
            $table->boolean('water_transport')->nullable();
            $table->boolean('trailer')->nullable();
            $table->boolean('lorry')->nullable();
            $table->boolean('bus')->nullable();
            $table->boolean('autodom')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
