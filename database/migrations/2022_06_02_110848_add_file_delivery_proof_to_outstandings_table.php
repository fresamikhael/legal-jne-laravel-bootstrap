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
            $table->string('file_delivery_proof')->after('file_subpoena_signature')->nullable();
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
            $table->dropColumn('file_delivery_proof');
        });
    }
};
