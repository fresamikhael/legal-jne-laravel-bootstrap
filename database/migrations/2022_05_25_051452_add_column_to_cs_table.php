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
            $table->string('file_peace_agreement')->after('file_case_report')->nullable();
            $table->string('file_somasi_2')->nullable();
            $table->string('file_customer_response_document')->nullable();
            $table->string('file_case_progress_report')->nullable();
            $table->string('file_court_lawsuit')->nullable();
            $table->string('file_court_bpsk')->nullable();
            $table->string('reason_case_temporary_close')->nullable();
            $table->string('other_supporting_documents')->nullable();
            $table->string('compensation_offer_nominal')->nullable();
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
            $table->dropColumn('file_peace_agreement');
            $table->dropColumn('file_somasi_2');
            $table->dropColumn('file_customer_response_document');
            $table->dropColumn('file_case_progress_report');
            $table->dropColumn('file_court_lawsuit');
            $table->dropColumn('file_court_bpsk');
            $table->dropColumn('reason_case_temporary_close');
            $table->dropColumn('other_supporting_documents');
            $table->dropColumn('compensation_offer_nominal');
        });
    }
};
