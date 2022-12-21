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
            $table->text('surface_area', 50)->nullable();
            $table->text('measure_number', 50)->nullable();
            $table->text('nop', 50)->nullable();
            $table->text('njop', 50)->nullable();
            $table->text('pbb', 50)->nullable();
            $table->text('retribution', 50)->nullable();
            $table->text('location', 50)->nullable();
            $table->text('transaction_value', 50)->nullable();
            $table->text('ppat', 50)->nullable();
            $table->text('seller_name', 50)->nullable();
            $table->text('nopol', 50)->nullable();
            $table->text('nobpkb', 50)->nullable();
            $table->text('nomes', 50)->nullable();
            $table->text('vehicle_type', 50)->nullable();
            $table->text('nostnk', 50)->nullable();
            $table->text('logo_file', 255)->nullable();
            $table->text('content', 50)->nullable();
            $table->text('design_type', 50)->nullable();
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
