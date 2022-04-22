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
            $table->string('file_subpoena_responese_draft')->after('nominal_indemnity_offer')->nullable();
            $table->string('case_analysis')->nullable();
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
            $table->dropColumn('file_subpoena_responese_draft');
            $table->dropColumn('case_analysis');
        });
    }
};
