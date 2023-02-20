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
        // Schema::table('regulations', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('filepath')->nullable();
        // });
        Schema::table('regulations', function (Blueprint $table) {
            // $table->dropColumn('director_name1');
            // $table->dropColumn('director_name2');
            // $table->dropColumn('director_name3');
            // $table->dropColumn('comms_name1');
            // $table->dropColumn('comms_name2');
            // $table->dropColumn('comms_name3');
            // $table->dropColumn('comms_term1');
            // $table->dropColumn('comms_term2');
            // $table->dropColumn('comms_term3');
            // $table->dropColumn('comms_arr1');
            // $table->dropColumn('comms_arr2');
            // $table->dropColumn('comms_arr3');
            // $table->dropColumn('comms_term_arr1');
            // $table->dropColumn('comms_term_arr2');
            // $table->dropColumn('comms_term_arr3');
            // $table->dropColumn('comms_name_share');
            // $table->dropColumn('comms_name_share2');
            // $table->dropColumn('comms_name_share3');
            // $table->dropColumn('comms_term_share');
            // $table->dropColumn('comms_term_share2');
            // $table->dropColumn('comms_term_share3');
            // $table->dropColumn('comms_arr_share');
            // $table->dropColumn('comms_arr_share2');
            // $table->dropColumn('comms_arr_share3');
            // $table->dropColumn('comms_term_arr_share');
            // $table->dropColumn('comms_term_arr_share2');
            // $table->dropColumn('comms_term_arr_share3');
            // $table->date('date_awal')->nullable();
            // $table->date('date_akhir')->nullable();
            // $table->string('legal_name')->nullable();
            $table->string('pic_no')->nullable();
            $table->string('pic_email')->nullable();
            $table->string('department')->nullable();
            $table->string('user_department')->nullable();
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
