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
        Schema::create('power_attorneys', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('name');
            $table->string('id_number');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('user_province');
            $table->string('user_regency');
            $table->string('user_district');
            $table->string('user_village');
            $table->string('user_zip_code');
            $table->text('user_address');
            $table->string('division');
            $table->string('departement');
            $table->string('attorney_purpose');
            $table->string('file_internal_memo')->nullable();
            $table->string('file_endorsee_id')->nullable();

            $table->string('user_note')->nullable();
            $table->string('cb_note')->nullable();

            $table->string('file_scan_power_attorneys')->nullable();
            $table->string('status')->default('PENDING');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('power_attorneys');
    }
};
