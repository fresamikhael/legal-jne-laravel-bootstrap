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
            $table->string('director_name1', 40)->nullable();
            $table->string('comms_name1', 40)->nullable();
            $table->string('comms_term1', 40)->nullable();
            $table->string('comms_arr1', 40)->nullable();
            $table->string('comms_term_arr1', 40)->nullable();
            $table->string('director_name2', 40)->nullable();
            $table->string('comms_name2', 40)->nullable();
            $table->string('comms_term2', 40)->nullable();
            $table->string('comms_arr2', 40)->nullable();
            $table->string('comms_term_arr2', 40)->nullable();
            $table->string('director_name3', 40)->nullable();
            $table->string('comms_name3', 40)->nullable();
            $table->string('comms_term3', 40)->nullable();
            $table->string('comms_arr3', 40)->nullable();
            $table->string('comms_term_arr3', 40)->nullable();
            $table->string('comms_name_share', 40)->nullable();
            $table->string('comms_term_share', 40)->nullable();
            $table->string('comms_arr_share', 40)->nullable();
            $table->string('comms_term_arr_share', 40)->nullable();
            $table->string('comms_name_share1', 40)->nullable();
            $table->string('comms_term_share1', 40)->nullable();
            $table->string('comms_arr_share1', 40)->nullable();
            $table->string('comms_term_arr_share1', 40)->nullable();
            $table->string('comms_name_share2', 40)->nullable();
            $table->string('comms_term_share2', 40)->nullable();
            $table->string('comms_arr_share2', 40)->nullable();
            $table->string('comms_term_arr_share2', 40)->nullable();
            $table->string('comms_name_share3', 40)->nullable();
            $table->string('comms_term_share3', 40)->nullable();
            $table->string('comms_arr_share3', 40)->nullable();
            $table->string('comms_term_arr_share3', 40)->nullable();
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
