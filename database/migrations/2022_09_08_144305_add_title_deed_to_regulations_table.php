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
            $table->string('title_deed')->nullable();
            $table->string('notary_name')->nullable();
            $table->string('director_name')->nullable();
            $table->string('comms_name')->nullable();
            $table->string('comms_term')->nullable();
            $table->string('comms_arr')->nullable();
            $table->string('comms_term_arr')->nullable();
            $table->string('sk_type')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kk')->nullable();
            $table->string('passport')->nullable();
            $table->string('kbli')->nullable();
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
