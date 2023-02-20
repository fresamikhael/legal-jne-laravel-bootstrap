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
        Schema::table('permits', function (Blueprint $table) {
            $table->dropColumn('file_disposition');
            $table->dropColumn('file_me');
            $table->dropColumn('file_architect');
            $table->dropColumn('file_technical');
            $table->dropColumn('file_building_photo');
            $table->dropColumn('file_other');
            $table->dropColumn('file_ads_photo');
            $table->dropColumn('file_statement_letter');
            $table->dropColumn('file_building_ownership');
            $table->dropColumn('file_pbb');
            $table->dropColumn('file_ownership_statement');
            $table->dropColumn('file_tlbbr');
            $table->dropColumn('file_location_polygon');
            $table->dropColumn('file_oss_form');
            $table->dropColumn('file_imb');
            $table->dropColumn('file_old_slf');
            $table->dropColumn('file_payment_proof');
            $table->dropColumn('file_old_skpd');
            $table->dropColumn('latest_skpd');
            $table->dropColumn('proof_of_payment');
            $table->dropColumn('receipt');
            $table->dropColumn('update_photo');
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
