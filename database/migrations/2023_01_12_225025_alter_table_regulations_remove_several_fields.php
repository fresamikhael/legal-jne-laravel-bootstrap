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
            $table->dropColumn('comms_name_share1');
            $table->dropColumn('comms_term_share1');
            $table->dropColumn('comms_arr_share1');
            $table->dropColumn('comms_term_arr_share1');
            $table->dropColumn('comms_name_file');
            $table->dropColumn('comms_term_file');
            $table->dropColumn('comms_arr_file');
            $table->dropColumn('comms_term_arr_file');
            $table->dropColumn('pas_photo');
            $table->dropColumn('passport_photo');
            $table->dropColumn('kk_photo');
            $table->dropColumn('npwp_photo');
            $table->dropColumn('ktp_photo');
            $table->dropColumn('logo_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
