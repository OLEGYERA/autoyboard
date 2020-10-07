<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranportChGearPivotTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranport_ch_gear_pivot_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ch_gear_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();

            $table->foreign('ch_gear_id')->references('id')->on('tranport_ch_gears');
            $table->foreign('type_id')->references('id')->on('transport_types');
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
        Schema::table('tranport_ch_gear_pivot_types', function (Blueprint $table) {
            $table->dropForeign('tranport_ch_gear_pivot_types_types_ch_gear_id_foreign');
            $table->dropForeign('tranport_ch_gear_pivot_types_types_type_id_foreign');
        });
        Schema::dropIfExists('tranport_ch_gear_pivot_types');
    }
}
