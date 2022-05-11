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
        Schema::table('cs', function (Blueprint $table) {
            $table->string('file_response_letter')->after('nominal_indemnity_offer')->nullable();
            $table->string('file_proof_shipment')->nullable();
            $table->string('file_acceptance_letter')->nullable();
            $table->string('file_case_report')->nullable();
            $table->string('file_invoice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cs', function (Blueprint $table) {
            $table->dropColumn('file_response_letter');
            $table->dropColumn('file_proof_shipment');
            $table->dropColumn('file_acceptance_letter');
            $table->dropColumn('file_case_report');
            $table->dropColumn('file_invoice');
        });
    }
};
