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
            $table->date('date_awal')->nullable();
            $table->date('date_akhir')->nullable();
            $table->string('legal_name')->nullable();
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
