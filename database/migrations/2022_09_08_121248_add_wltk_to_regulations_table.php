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
            $table->string('wltk')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('pp')->nullable();
            $table->string('lks')->nullable();
            $table->string('p2k3')->nullable();
            $table->string('smk3')->nullable();
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
