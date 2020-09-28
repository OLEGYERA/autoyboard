<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportChTechPivotTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_ch_tech_pivot_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ch_tech_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();

            $table->foreign('ch_tech_id')->references('id')->on('transport_ch_teches');
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
        Schema::table('transport_ch_tech_pivot_types', function (Blueprint $table) {
            $table->dropForeign('transport_ch_tech_pivot_types_ch_tech_id_foreign');
            $table->dropForeign('transport_ch_tech_pivot_types_type_id_foreign');
        });
        Schema::dropIfExists('transport_ch_tech_pivot_types');
    }
}
