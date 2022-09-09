<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regulations', function (Blueprint $table) {
            $table->string('surface_area', 50)->nullable();
            $table->string('measure_number', 50)->nullable();
            $table->string('nop', 50)->nullable();
            $table->string('njop', 50)->nullable();
            $table->string('pbb', 50)->nullable();
            $table->string('retribution', 50)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('transaction_value', 50)->nullable();
            $table->string('ppat', 50)->nullable();
            $table->string('seller_name', 50)->nullable();
            $table->string('nopol', 50)->nullable();
            $table->string('nobpkb', 50)->nullable();
            $table->string('nomes', 50)->nullable();
            $table->string('vehicle_type', 50)->nullable();
            $table->string('nostnk', 50)->nullable();
            $table->string('logo_file', 255)->nullable();
            $table->string('content', 50)->nullable();
            $table->string('design_type', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regulations', function (Blueprint $table) {
            //
        });
    }
};
