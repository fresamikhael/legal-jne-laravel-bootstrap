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
            $table->string('file_subpoena_agent_response')->after('file_delivery_proof')->nullable();
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
            $table->dropColumn('file_subpoena_agent_response');
        });
    }
};
