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
        Schema::table('outstandings', function (Blueprint $table) {
            $table->string('file_court_lawsuit')->after('file_agreement_draft')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outstandings', function (Blueprint $table) {
            $table->dropColumn('file_court_lawsuit');
        });
    }
};
